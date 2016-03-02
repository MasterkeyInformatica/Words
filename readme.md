Words
=====

[![Build Status](https://travis-ci.org/MasterkeyInformatica/Words.svg?branch=master)](https://travis-ci.org/MasterkeyInformatica/Words)

Este pacote foi desenvolvido para solucionar um problema muito comum
em sites e sistemas desenvolvidos no Brasil: Caracteres acentuados.

Adicionando ao Projeto
======================

Para adicionar o Words ao se projeto, utilize o composer:

```sh
$ composer require masterkey/words
```

Depois, adicione o autoload do composer ao seu projeto

```php
require_once "vendor/autoload.php"
```

Agora, basta chamar classe Words para converter sua string

```php
echo Masterkey\Words\Words::removeAcentos('Olá'); // Retorna Ola
```

Como segundo parâmetro, podemos passar `true` para que a string
seja retornada em UpperCase

```php
echo Masterkey\Words\Words::removeAcentos('Olá', true); // Retorna OLA
```
