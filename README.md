# Basic PHP Field Validator - Laravel Style
I developed it for my projects but feel free to use it in yours.

  - Input Validation 
  - Set multiple Validation Rules in Laravel style
  

# Installation
I'm not planning to publish it as Composer Package. You can Clone the project or add this inside your composer.json:
```javascript
"require": {
    	"pbattiston/phpfieldvalidator": "dev-main"
},

"repositories": [ 
    {
            "url": "https://github.com/PietroBattiston/PhpFieldValidator.git",
            "type": "git"
    }
]
```
And than run:
```sh
composer update
```

# Usage

```php
$validator = new PhpFieldValidator([
	'field_name' => 'rule1|rule2|rule3',
	'field_name2' => 'rule1|rule2|rule3'
]);
$validator->prepare();
```

## Example

```php
$validator = new PhpFieldValidator([
    'first_name' => 'type:string|sanitize|required',
    'age' => 'numeric|required',
    'bio' => 'sanitize|max:500'
]);

$validator->prepare();
```
> NOTE: "Required" must always be the last Rule.
```php
if (empty($validator->errors)) {
    //do something
    var_dump($validator->validatedContent)
}else{
    //do something
	var_dump($validator->errors);
}
```

> If the validation fails for one Rule, the content will be set as NULL and the validation for the current Field will stop. An error will be stored.

# Rules

| Rule | Description |
| ------| ------ |
| sanitize | Sanitize a string |
| email | Check if valid email and sanitize it |
| required | Check if the field is not empty |
| numeric | Check if is numeric |
| length:value | Check the string length. The value must match with the actual length |
| min:value | Check if the string respect the minimum length  |
| max:value | Check if the string respect the maximum length |
| type | Check the type. Refer to [PHP gettype](https://www.php.net/manual/en/function.gettype.php)  |

### Helpers
| Helper | Description |
| ------| ------ |
| slug | replace whitespaces with - |
| nospace | delete whitespaces |

License
----

MIT
