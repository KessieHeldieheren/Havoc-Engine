# Havoc Engine
Havoc Engine is a PHP-based game engine designed to run 2D games in the command-line.

This project exists purely as a demonstration of building unorthodox applications using PHP. The project is built using [PHP 7.2](http://php.net/releases/7_2_0.php). Some may find the existence of this library offensive. It's all right, I find it offensive as well.

**Version**: 0.0.0-alpha

**Author**: Kessie Heldieheren

**Email**: kessie@sdstudios.uk

## Pre-word
This documentation uses [RFC 2119](https://www.ietf.org/rfc/rfc2119.txt) to define the terms MUST, MUST NOT, SHOULD, and SHOULD NOT. Such as one SHOULD NOT build a game engine using PHP. But not to say one cannot.

Should you begin to experience a tingling sensation  around the front of your head, and you have an overwhelming urge to use `strlen` to hash functions, think that variables ought to be prefixed with `$`, or that [YODA](https://en.wikipedia.org/wiki/Yoda_conditions) conditionals look attractive in ways one wouldn't talk about in public, please make an appointment with your general practitioner.

## Table of Contents
* §1 - [Instantiating the Engine](#S1)
* §2 - [Extending the Engine](#S2)

## <a name="S1">Instantiating the Engine</a>
The game engine core can be instantiated via the [API](#Api).  The API contains various helper functions for accessing engine modules, as well as a method for rendering output ([`Api::render`](#Api_render)).

**Important**
The game core will not be usable immediately. The core must be bootstrapped using [`Api::bootstrap`](#Api_bootstrap). This will then load all controllers (how to extend the engine's controllers and modules is explained in [Extending the Engine](#S2)).

## <a name="S2">Extending the Engine</a>
Havoc Engine allows all of its controllers to be readily swapped out for extensions that implement the respective interfaces of the original controllers. This would allow a developer to write a renderer that renders to the browser, or to change how logs are handled, such as adding them to a database. This section explains how to extend these modules.

First of all, it is important to know that when the engine is instantiated, **it is waiting for the bootstrapper to be run in order to load components**. The bootstrapper uses  [`ControllersInterface`](#ControllersInterface) to determine what classes the factories should return when instantiating all of the controllers. So after having instantiated the engine, you may call on the Controllers module to set what classes the engine will use.

Via the API, this may be done using the [`Api::controllers`](#Api_controllers) method, and then using the appropriate set method and providing the **fully qualified class name** of the new controller. Validation for the class names provided is done in their respective controller factories. Naturally, all controllers MUST implement their respective interfaces.

## Class Reference

### Havoc\Engine\\<a name="Api">Api</a>

> <a name="Api_render">`Api::render`</a>
> 
> `bool` `$increment_tick` `= true` if true, the current tick will be incremented.
> 
> This method renders the world and returns [`RenderInterface`](#RenderInterface).

> <a name="Api_bootstrap">`Api::bootstrap`</a>
> 
> Bootstraps the engine core.
> 
> This method is used to load all engine components, such as controllers, supervisors, and other utility classes. This method must be run before the engine may be utilised.

> <a name="Api_controllers">`Api::controllers`</a>
> 
> `returns` `ControllersInterface`
> 
> Returns the Controllers object. Used to set what controllers the engine will use.

------
