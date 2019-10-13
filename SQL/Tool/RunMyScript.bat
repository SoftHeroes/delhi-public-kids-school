for %%f in (*.sql) do (mysql -h localhost -u root dpks_master < "%cd%\%%f") > "%%f.out" 2>&1
