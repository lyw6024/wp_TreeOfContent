# malicTOC

Wordpress 生成单篇文章的插件（解析post中的h2与h3，并生成在正文之前，点击链接可以索引到相应位置）

## 用法

将此文件夹放在wp-content/plugins/下，可以建立一个文件夹（如malicTOC），并将文件复制在相应文件夹内，即可在管理页的“插件”一栏中看到“malicTOC”的插件。

开启插件后，并没有在所有文章都生成目录，在想使用目录的文章中加入一句[malicTOC]（需要有方括号），即可将本文的h2与h3的内容在文章正文之前列出，并能执行链接到相应位置。