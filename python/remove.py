#!/usr/share/python3

f = open("../index.php","r+")
d = f.readlines()
f.seek(0)
for i in d:
    if i != "<?php header('Location: maintenance.php') ?>\n":
        f.write(i)
f.truncate()
f.close()