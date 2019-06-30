# php-boilerplate-API
A collection of helper classes to perform generic functions in php web development

## classes contained
* **Config**      - Global access to config options
* **DB**          - Database class (uses PDO)
* **Flash**       - Flash messages class (uses Session storage)
* **Hash**        - Password hashing and verification class
* **Redirect**    - Page redirection class
* **Request**     - For getting request type and form values (for POST)
* **Session**     - Provides session storage capabilities
* **Token**       - Tokenization on forms for csrf attacks 
* **User**        - Basic wrapper around DB class for user operations
* **Validation**  - Basic rules for form validation

## setup files
* **config**    - contain configuration options
* **constants** - Conatin information that should be hidden e.g password, db connection params
* **init**      - Used by almost all view files. Contain basic setup like session starts, class autoloading, fetching a logged in or anonymous user
* **utils**     - Used by almost all classes. Contains utility funtcions