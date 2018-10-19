# Havoc Engine v1.0.0

## Instantiating
The engine can be instantiated either directly or via the engine's API, which provides short and neat get methods for various controllers and dependencies that a developer may want to include.

Either include the engine via `Havoc\Engine\Engine\Core` or via `Havoc\Engine\Api`.

The engine may be directly accessed through the API via `Api::getCore`.

In order to use the engine, you must then call `Engine::bootstrap` or `Api::bootstrap`. This will load all controllers.

NOTE: only the API has the native functionality to render the world. It is recommended to use the API and not the core directly.

## Customising the Core
All engine controllers and modules may be swapped out after instantiating the engine.

For primary systems this is done using `Havoc\Engine\Core\Systems\Controllers`. Once the engine is instantiated, you may add your own extensions of the controllers.

* Setting a controller using the engine: `Engine::getControllers`.
* With the API: `Api::controllers`.

### Swapping out ConfigController
The configuration controller may be swapped out by extending `ConfigControllerInterface` and re-assigning it through `Core::assignNewConfigController`.