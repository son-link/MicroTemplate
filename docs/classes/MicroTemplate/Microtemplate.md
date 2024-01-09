***

# Microtemplate

Lightweight PHP template system. Zero dependencies: download, add the script and it's ready to use (W.I.P.)



* Full name: `\MicroTemplate\Microtemplate`

**See Also:**

* https://github.com/son-link/MicroTemplate - 



## Properties


### views_folder



```php
private string $views_folder
```






***

### data



```php
private array $data
```






***

## Methods


### __construct



```php
public __construct(string $path, array $data = []): mixed
```








**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$path` | **string** |  |
| `$data` | **array** |  |





***

### render

Constructs the output based on a filename and the data provided.

```php
public render(string $view, array $data = []): string
```








**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$view` | **string** | Path to the view inside the directory defined in the constructor without the extension (.php) |
| `$data` | **array** | An array with the data to be passed to the view |





***

### escape

Escapes HTML special caracteres such <, >, ', " for prevent inject malicious code

```php
public escape(mixed $string): mixed
```








**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$string` | **mixed** |  |





***


***
> Automatically generated on 2024-01-09
