<?php\nfunction fonction($nom) {\n    printf("bienvenue %s dans le projet github\n", $nom);}\n\nif (__FILE__ == realpath($_SERVER["SCRIPT_FILENAME"])) {\n    fonction("equilibre");\n}\n?>
