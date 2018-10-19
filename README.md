
# Havoc Engine  
Havoc Engine is a PHP-based game engine designed to run 2D games in the command-line.  
  
  ## Information
This project exists purely as a demonstration of building unorthodox applications using PHP. The project is built using [PHP 7.2](http://php.net/releases/7_2_0.php). Some may find the existence of this library offensive. It's all right, I find it offensive as well.  
  
**Version**: 0.0.0-alpha  
  
**Author**: Kessie Heldieheren  
  
**Email**: kessie@sdstudios.uk  
  
## Pre-word  
This documentation uses [RFC 2119](https://www.ietf.org/rfc/rfc2119.txt) to define the terms MUST, MUST NOT, SHOULD, and SHOULD NOT. Such as one SHOULD NOT build a game engine using PHP. But not to say one cannot.  
  
Should you begin to experience a tingling sensation  around the front of your head, and you have an overwhelming urge to use `strlen` to hash functions, think that variables ought to be prefixed with `$`, or that [YODA](https://en.wikipedia.org/wiki/Yoda_conditions) conditionals look attractive in ways one wouldn't talk about in public, please make an appointment with your general practitioner.  
  
## Table of Contents  
* §1 - [Instantiating the Engine](#instantiating-the-engine)  
* §2 - [Extending the Engine](#extending-the-engine)
* §3 - [The Api](#the-api)
  
## <a name="instantiating-the-engine">Instantiating the Engine</a>  
The game engine core can be instantiated via the [API](#Api).  The API contains various helper functions for accessing engine modules, as well as a method for rendering output ([`Api::render`](#Api_render)).  

The game core will not be usable immediately. The core must be bootstrapped using [`Api::bootstrap`](#Api_bootstrap). This will then load all controllers (how to extend the engine's controllers and modules is explained in [Extending the Engine](#S2)).

*Instantiate the engine by doing the following:*
```php
$engine = Havoc\Engine\Api\ApiFactory::new();
```

*Then run the engine bootstrapper:*
```php
$engine->bootstrap();
```  

## <a name="extending-the-engine">Extending the Engine</a>  
Havoc Engine allows all of its controllers to be readily swapped out for extensions that implement the respective interfaces of the original controllers. This would allow a developer to write a renderer that renders to the browser, or to change how logs are handled, such as adding them to a database. This section explains how to extend these modules.  
  
First of all, it is important to know that when the engine is instantiated, **it is waiting for the bootstrapper to be run in order to load components**. The bootstrapper uses  [`ControllersInterface`](#ControllersInterface) to determine what classes the factories should return when instantiating all of the controllers. So after having instantiated the engine, you may call on the Controllers module to set what classes the engine will use.  
  
Via the API, this may be done using the [`Api::controllers`](#Api_controllers) method, and then using the appropriate set method and providing the **fully qualified class name** of the new controller. Validation for the class names provided is done in their respective controller factories. Naturally, all controllers MUST implement their respective interfaces.

*Example custom log controller (class content missing):*
```php
class MyLogController implements Havoc\Engine\Logger\LogControllerInterface {}
```

*Example override of the log controller:*
```php
$engine->controllers()->setLogController(MyLogController::class);
```
  
## <a name="the-api">The API</a>
The API stores all of the common and necessary modules the engine uses in simple functions. All of the methods provided can be found [here](#Api). The API is essentially a wrapper for the engine core.

*Example of getting the entity supervisor, the module which allows one to create and manipulate entities in the world:*
```php
// Returns Havoc\Engine\Entity\EntitySupervisor.
$engine->entities();
```

*Example of getting the configuration controller, which allows one to alter engine settings:*
```php
// Returns the configuration controller.
$engine->config();
```

## Class Reference  
### Havoc\Engine\\<a name="Api">Api</a>
The Api class provides an easy to use programming interface through which to use the Havoc Engine.
> ### <a name="Api_render">`Api::render`</a>  
> * **bool** `$increment_tick` `true`:  if true, the current tick will be incremented.
> * **returns** [`RenderInterface`](#RenderInterface).
>   
> This method renders the world and returnsa render interface by which to output the game world. It also optionally increments the current game tick.
  ------------------------
> ### <a name="Api_bootstrap">`Api::bootstrap`</a>
> * **void**
>   
> Bootstraps the engine core.  
>   
> This method is used to load all engine components, such as controllers, supervisors, and other utility classes. This method must be run before the engine may be utilised.  
  ------------------------
> ### <a name="Api_controllers">`Api::controllers`</a>  
> * **returns** [`ControllersInterface`  ](#ControllersInterface)
>   
> Returns the Controllers object. Used to set what controllers the engine will use.  
------------------------
> ### <a name="Api_config">`Api::config`</a>  
> * **returns** [`ConfigControllerInterface`  ](#ConfigControllerInterface)
>   
> Returns the configuration controller. 
------------------------
> ### <a name="Api_world">`Api::world`</a>  
> * **returns** [`WorldControllerInterface`  ](#WorldControllerInterface)
>   
> Returns the world controller. 
------------------------
> ### <a name="Api_tick">`Api::tick`</a>  
> * **returns** [`TickControllerInterface`  ](#TickControllerInterface)
>   
> Returns the tick controller. 
------------------------
> ### <a name="Api_entities">`Api::entities`</a>  
> * **returns** [`EntitySupervisorInterface`  ](#EntitySupervisorInterface)
>   
> Returns the entity supervisor. 
------------------------
> ### <a name="Api_logger">`Api::logger`</a>  
> * **returns** [`LogControllerInterface`  ](#LogControllerInterface)
>   
> Returns the log controller. 
------------------------
> ### <a name="Api_types">`Api::types`</a>  
> * **returns** [`TypeSupervisorInterface`  ](#TypeSupervisorInterface)
>   
> Returns the entity type supervisor. 
------------------------
> ### <a name="Api_translation">`Api::translation`</a>  
> * **returns** [`TranslationSupervisorInterface`  ](#TranslationSupervisorInterface)
>   
> Returns the entity translation supervisor. 
------------------------
> ### <a name="Api_getCore">`Api::getCore`</a>  
> * **returns** [`CoreInterface`  ](#CoreInterface)
>   
> Returns the engine core. 
------------------------
