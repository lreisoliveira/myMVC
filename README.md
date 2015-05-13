# myMVC

Microframework em PHP para estudos de conceito MVC e patterns


# Requisitos funcionais

PHP >=5.5

MySQL

Servidor com o moderewrite habilitado. Para este exemplo foi utilizado Apache2.

Servidor Linux 

 
# Instalação

Clone este projeto para seu diretório local e na raiz, através do terminal digite:
  
$ sudo php composer.phar install [enter]

Isto irá atualizar o projeto com as bibliotecas necessárias
 
Somente para quem tem Apache, no terminal digite: 
 
$ sudo a2enmod rewrite [enter]

Isto irá habilitar o moderewrite.


No terminal digite:
 
$ vim /etc/apache2/sites-enabled/000-default

copie e cole o conteúdo do arquivo virtual-host.txt localizado na raiz deste diretório.
 
 	
No terminal digite:

$ vim /etc/hosts
 
e adicione na primeira linha
 
127.0.0.1	mvc.git
 
onde 127.0.0.1 é padrão mas pode ser o ip de onde está seu servidor
 
onde mvc.git é a URL que será acessado via browser
 

Reinicie o apache
 
$ service apache2 restart
 
Acesse o browser no endereço http://mvc.git
 
 
# Instruções

A sequência de arquivos a ser estudado segue a sequencia abaixo a partir da raiz do projeto:
  
/public/index.php
  
/App/init.php
  
/App/Controllers/Index.php
  
/vendor/SON/Controller/Action.php
  
/App/views/index/index.phtml
  
/vendor/SON/Controller/Crud.php
  
/vendor/SON/Controller/Container.php
  
/vendor/SON/Db/Table.php
 
 
# Conexão com banco de dados
  
Usuário, host e senha de conexão com o bando de dados está em
  
/vendor/SON/Di/Conteiner.php
  
Altere conforme sua configuração
  
O dump da tabela de exemplo está na raiz deste projeto com o nome de base.sql
  
 