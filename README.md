# Medical System

❗ Para facilitar o acesso do usuário, foi decidido hospedar esse site em um Host gratuito, que apesar das limitações, consegue executar bem as funções do site.
Acesse em: [**Medical System**](https://encurtador.com.br/buEV9)

---
<h1 align="center">
  <img src="assets/images/home.png">
</h1>

---

# 🔎 Indice

- [Sobre](#-sobre)
- [Principais Funções](#-principais-funções)
- [Tecnologias Utilizadas](#-tecnologias-utilizadas)
- [Colaboradores](#-colaboradores)

---

## 🧾 Sobre

O **Medical System** é um sistema de gestão de pessoas (médicos e funcionários gerais) de um hospital fictício. Este sitema tem como intuito por em prática o conhecimento em desenvolvimento web, bem como, expor os desenvolvedores a novos desafios.

#### Detalhes do Sistema

Medical System é um sistema que tem como intuito passar a melhor expêriencia para o usuário, por isso todas as alterações são feitas de maneira assíncrona (não necessitando atualização da página para recarga dos dados).

O sistema por ser exclusivo para acesso em dispositivos com telas mais expansivas (Computadores e Notebooks), não houve a necessidade de fazer acessível para devices mobile e afins.

Este sistema oferece apenas uma hierarquia: a de administrador geral. Na qual o usuário tem total liberdade para adicionar, remover e editar registros de médicos e funcionários.

<h1 align="center">
  <img src="assets/images/add.png">
</h1> <br><br>

Para obter acesso como administrador é necessário apenas criar um novo usuário utilizando um email que não foi cadastrado ainda.
<h1 align="center">
  <img src="assets/images/sign.png">
</h1> <br>

---

## 🔧 Principais Funções 

Algumas ferramentas foram adicionadas para melhorar a expêriencia do usuário.

#### Pesquisa de registros
A função de pesquisar um médico ou funcionário através do nome facilita em casos que haja muitos registros no sistema.

<h1 align="center">
  <img src="assets/images/search.png">
</h1> <br><br>

#### Adicionar Médico
Há a possibilidade de registrar um novo médico no sistema, entretanto não será aceito o registro caso já exista o mesmo CPF, CRM ou e-mail registrado. Caso estes dados sejam inéditos, o médico é adicionado instantaneamente e o registro aparece na tabela automaticamente. 

<h1 align="center">
  <img src="assets/images/warning.png">
</h1> <br><br> 

#### Adicionar Funcionário

O cadastro de um novo funcionário no sistema é feito da mesma forma, entretanto as restrições são apenas duas: CPF e e-mail.

<h1 align="center">
  <img src="assets/images/emp.png">
</h1> <br><br>

#### Editar de registros

Para editar um registro de um Médico ou Funcionário, basta clicar no símbolo de edição (🖊), adjacente ao registro desejado. Após isso aparecerá uma janela modal com os dados do registro selecionado. Um fato interessante é que não há a possibilidade de alterar o CPF ou CRM no caso do médico.

<h1 align="center">
  <img src="assets/images/edit.png">
</h1> <br><br>

#### Deletar registros

Clicando no ícone de lixeira adjacente ao registro desejado, aparece um botão interrogando se há realmente o desejo de deleção do registro, caso seja negado o registro permanecerá intacto.

<h1 align="center">
  <img src="assets/images/delete.png">
</h1> <br><br>

#### Enviar email (em fase de teste)

Ao clicar no ícone de email adjacente ao registro que deseja contactar, abre-se uma janela modal com o email utilizado no ato do registro do médico ou funcionário já informado.

<h1 align="center">
  <img src="assets/images/email.png">
</h1> <br><br>

#### Sair do sistema

Ao clicar no seu nome (canto superior direito da tela), irá aparecer um botão de sair, ao clicar nele você será desconectado automaticamente do site e redirecionado para página de login.

<h1 align="center">
  <img src="assets/images/out.png">
</h1> <br><br>

---

## 🔌 Tecnologias Utilizadas

Todas as funções listadas acima foram desenvolvidas com as seguintes tecnologias:

#### Front-End

- HTML
- CSS
- [Bootstrap](https://getbootstrap.com/)
- [JQuery](https://api.jquery.com/)

#### Requisições

- [AJAX](https://api.jquery.com/jquery.ajax/)
- [JSON](https://www.json.org/json-en.html)

#### Back-End

- [PHP](https://php.net)

#### Banco de Dados

- MySQL

---

## 🎓 Colaboradores

[**Diego**](https://github.com/King-ego) foi responsável pela produção de todo o layout do sistema, utlizando HTML, CSS, BootStrap e JQuery

---
[**Ezequiel**](https://github.com/devEzequiel), por sua vez, foi responsável por toda configuração de back-end e implementações das regras de negócios, utilizando PHP OOP e Banco de Dados MySQL. Além de criar todas as requisições utilizando AJAX & JQuery.



