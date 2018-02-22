#Antes de este paso renombrar caja a caja_db en archivp propel.ini
./propel sql:build
./propel model:build
./propel config:convert
-----------------------------------
#Antes de este paso renombrar caja_db a caja en archivp propel.ini
#excepto dbname=caja_db
./propel sql:insert
