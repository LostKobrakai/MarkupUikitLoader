MarkupUikitLoader
================

Configure and inject the uikit framework markup (www.getuikit.com)

### QUICK CDN Install:
1. Activate uikit CDN, check for current version (https://cdnjs.com/libraries/uikit) and update version number field.
### LOCAL uikit HOSTING:
1. Get the YOOtheme uikit framework http://www.getuikit.com
2. Extract and place it in your PW templates folder (e.g.: styles/uikit-2.26.4/...)
3. Remember the uikit base folder name (e.g.: uikit-2.26.4) and update it in the module settings as the default will very likely not be current. You can maintain / test different versions.
### FINAL STEPS:
4. Place <!--uikit-here-CSS--> and <!--uikit-here-JS--> in the HTML head section
5. Setup loading conditions.
---
uikit CDN only works with default styles (yet).
If you are using PW site profiles, styles/main.css might override uikit. Merge or place <!--uikit-here-CSS--> below the main.css link.
The module will not minimize files for you, only load them if the .min. version is available!
