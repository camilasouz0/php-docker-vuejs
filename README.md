# PHP + DOCKER + VUEJS #
    Se trata de um projeto de mercado que realiza cadastro de produtos e valores percentuais de imposto.

### Objetivo
    Tem como objetivo concluir as etapas do Desafio técnico referente a vaga de Desenvolvedor(a) Full Stack.

### Pré-requisitos
    - Git
    - Editor de sua preferência.

### Clone este repositório
    $ git clone https://github.com/camilasouz0/teste-softexpert.git

### Acesse a pasta do projeto no terminal/cmd
    $ cd teste-softexpert

### Instale as dependências
    $ composer install

### Conexão com o banco de dados
    Acesse config/config.php
    define("DB_CONNECTION", "pgsql");
    define("DB_HOST", "db");
    define("DB_PORT", "5432");
    define("DB_DATABASE", "mydb");
    define("DB_USERNAME", "postgres");
    define("DB_PASSWORD", "postgres");
    define('SITE_HOST', 'http://localhost');

    Obs: crie um banco chamado mydb e importe o arquivo mydb.sql, no dbever escolher fomato custom

### O projeto inicializa apenas utilizando docker
    $ docker-compose up
    - acesse http://localhost/index.html

### Testes unitários
    $ vendor\bin\phpunit

    Acesse o arquivo no navegador {caminho-seu-computador}\coverage\index.html para visualizar
### TECNOLOGIAS UTILIZADAS

| Tecnologia            | Descrição                                               |
| --------------------- | --------------------------------------------------------|
| [PHP 8]               | PHP é uma linguagem interpretada livre                  |
| [Vue.js 3]            | Framework JavaScript                                    |
| [vue-router]          | Router oficial do Vue.js                                |
| [Bootstrap 4]         | framework desenvolvimento de interface e front-end      |
| [Font-awesome]        | Ferramentas de fontes e ícones                          |
| [Axios]               | Cliente HTTP baseado em Promises para fazer requisições |
| [Sweetalert]          | Exibir alertas na tela              |

[PHP 8]: https://www.php.net
[Vue.js 3]: https://vuejs.org
[vue-router]: https://github.com/vuejs/vue-router
[Bootstrap 4]: https://getbootstrap.com/docs/4.6/getting-started/introduction/
[Font-awesome]: https://fontawesome.com
[Axios]: https://axios-http.com/ptbr/docs/intro
[Sweetalert]: https://sweetalert2.github.io

### Sobre o autor
    Sou desenvolvedora Full Stack
    Camila Mayara Cardoso de Souza - camilamayaracardoso20@gmail.com
