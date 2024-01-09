<?php
namespace MicroTemplate;

/**
 * Lightweight PHP template system. Zero dependencies: download, add the script and it's ready to use (W.I.P.)
 * @author Alfonso Saavedra "Son Link" <sonlink.dourden@gmail.com>
 * @copyright 2024 Alfonso Saavedra "Son Link"
 * @link https://github.com/son-link/MicroTemplate
 */
class Microtemplate
{
	/**
	 * @var string
	 */
	private string $views_folder;

	/**
	 * @var array
	 */
	private array $data;

	public function __construct(string $path, array $data=[])
	{
		$this->views_folder = trim($path);
		$this->data = $data;
	}

	/**
	 * Constructs the output based on a filename and the data provided.
	 * 
	 * @param string $view Path to the view inside the directory defined in the constructor without the extension (.php)
	 * @param array $data An array with the data to be passed to the view
	 * @return string
	 * @example . render('post', ['title' => 'My first post'])
	 * @example . render('includes/header')
	 */
	public function render(string $view, array $data=[]): string
	{
		$path = sprintf('%s/%s.php', $this->views_folder, trim($view));

		if (!is_file($path)) throw new \Exception("View file $view don't found or is't a file", 1);

		ob_start();
		if (is_array($data)) $this->data = array_merge($this->data, $data);
		else if (is_object($data)) $this->data = array_merge($this->data, (array) $data);

		try
		{
            $level = ob_get_level();
            ob_start();

            (function()
			{
                extract($this->data);
                include func_get_arg(0);
            })($path);

            $content = ob_get_clean();

            return $content;
        }
		catch (\Throwable $e)
		{
            while (ob_get_level() > $level) ob_end_clean();

            throw $e;
        }
	}

	/**
	 * Escapes HTML special caracteres such <, >, ', " for prevent inject malicious code
	 */
	public function escape(mixed $string)
	{
		return htmlspecialchars($string);
	}
}