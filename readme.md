# Draft Convention
Please follow the following conventions

## Names
please be specific in giving variable names

**OKAY**

* weekly_pay = hours_worked * pay_rate;

**NOT OKAY**

* a = b * c;

php keywords **MUST** be in lower case
 
 **OKAY**
 * true
 * false
 * null

 **NOT OKAY**
 * TRUE
 * FALSE
 * NULL

## Methods/Functions
Visibility **MUST** be declared on all methods

**OKAY**
```php
    public function getStudent()
    {
        
    }
```

**NOT OKAY**
```php
    function getStudent()
    {
        
    }
```

## Spaces/Tabs/Lines/Indents
1 tab = 4 spaces
## Files

## Control Structures
The general style rules for control structures are as follows:

* There MUST be one space after the control structure keyword
* There MUST NOT be a space after the opening parenthesis
* There MUST NOT be a space before the closing parenthesis
* There MUST be one space between the closing parenthesis and the opening brace
* The structure body MUST be indented once
* The closing brace MUST be on the next line after the body
* The body of each structure MUST be enclosed by braces. This standardizes how the structures look, and reduces the likelihood of introducing errors as new lines get added to the body.

## Tables
* Plural form

## Models
* Singular

## Controller
* Singular Followed by Controller

## View
must follow REST FORMAT
* example
* ACTION - URL - VIEW - FUNCTION
* ADD - /tag/create - create_tag_blade.php - create()
* EDIT - /tag/{id}/edit - edit_tag_blade.php - edit()
* UPDATE - /tag/{id} - none - update()
* index - /tag = list_tag_blade.php - index()