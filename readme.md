I hated the built in one too much-- mainly because it didn't have collections. Neither does this one, for now.
### If you know how to develop mods, please develop a small one to go along with this mod manager and reload the mods when externalactives in the games install directory changes.
## Implemented
- Keybind launched overlay, `SHIFT M` and `SHIFT ESC`.
- Toggling Mods
- Viewing mods
- Shows if the mod is active
- For some reason breaks on random mods? check items.php if you feel like investigating the issue.
## Planned Features
- Collections
###### oh wait yeah its a mod manager thats about it.
##### But also...
#### I do need to talk about
## SETUP
Requirements:
- PHP
- [OPTIONAL] Python
### 1. Setting up webserver:
just run `php -S localhost:80`
### 2. Using python keybind launcher:
Just run this command:
`pip install keyboard pywebview`
Then, you do:
`python launcher.py`
and you good.
### 3. WARNING:
#### From testing, It's been shown not to make immediate affects, requiring PPG restart. This means that you have to run the mod manager before the game, if you want it to affect things.
