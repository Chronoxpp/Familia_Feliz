# Documentação de classes

## Índice

- [Voltar ao índice principal](index.md)
- [Introdução](#introdução)
- [Diagramas](#diagramas)
- [Classes](#classes)
  - Autenticação
    - [AutenticacaoControlador](#autenticacaocontrolador)
    - [AutenticacaoServicos](#autenticacaoservicos)
  - Email
    - [EmailServicos](#emailservicos)
  - Família
    - [Familia](#familia)
    - [FamiliaControlador](#familiacontrolador)
    - [FamiliaServicos](#familiaservicos)
    - [FamiliaRepositorio](#familiarepositorio)
  - Lista de compras
    - [ListaCompras](#listacompras)
    - [ListaComprasControlador](#listacomprascontrolador)
    - [ListaComprasServicos](#listacomprasservicos)
    - [ListaComprasRepositorio](#listacomprasrepositorio)
    - [ItemListaCompras](#itemlistacompras)
  - Logs de auditoria
    - [LogAuditoria](#logauditoria)
    - [LogAuditoriaControlador](#logauditoriacontrolador)
    - [LogAuditoriaServicos](#logauditoriaservicos)
    - [LogAuditoriaRepositorio](#logauditoriarepositorio)
  - Notificação
    - [Notificacao](#notificacao)
    - [NotificacaoControlador](#notificacaocontrolador)
    - [NotificacaoServicos](#notificacaoservicos)
    - [NotificacaoRepositorio](#notificacaorepositorio)
  - Permissões
    - [PermissaoAcesso](#permissaoacesso)
    - [PermissaoAcessoControlador](#permissaoacessocontrolador)
    - [PermissaoAcessoServicos](#permissaoacessoservicos)
    - [PermissaoAcessoRepositorio](#permissaoacessorepositorio)
  - Usuário
    - [Usuario](#usuario)
    - [UsuarioControlador](#usuariocontrolador)
    - [UsuarioServicos](#usuarioservicos)
    - [UsuarioRepositorio](#usuariorepositorio)
- [Padrões de projeto](#padrões-de-projeto)

## Introdução

Essa é a documentação das classes utilizadas no projeto. Aqui você encontra em detalhes as classes, como elas interagem entre si, suas responsabilidades, etc. 

## Diagramas

Aqui serão inseridos os digramas de classes.

## Classes

### nome da classe

Resumo: descrição sobre a classe

Responsabilidades: 

- Responsabilidades da classe

Atributos:

| Atributo | Tipo | Descrição |
|----------|------|-----------|

Métodos:

| Método | Argumentos | Retorno | Descrição |
|--------|------------|---------|-----------|

---

---

### AutenticacaoControlador

Resumo: atende a requisições relacionadas a autenticação no sistema, como login, geração de senhas, etc.

Responsabilidades:

- Atender requisições para autenticar usuários

Atributos:

| Atributo | Tipo | Descrição |
|----------|------|-----------|

Métodos:

| Método | Argumentos | Retorno | Descrição |
|--------|------------|---------|-----------|

---

---

### AutenticacaoServicos

Resumo: realizar serviços relacionados a autenticação, como a criação de senhas, autenticação de usuários, geração de tokens, etc

Responsabilidades:

- Autenticar usuários
- Criptografar senhas
- Gerar tokens

Atributos:

| Atributo | Tipo | Descrição |
|----------|------|-----------|

Métodos:

| Método | Argumentos | Retorno | Descrição |
|--------|------------|---------|-----------|

---

---

### EmailServicos

Resumo: realiza operações relacionadas a email, como validação e envio de emails

Responsabilidades:

- Validar email
- Enviar email

Atributos:

| Atributo | Tipo | Descrição |
|----------|------|-----------|

Métodos:

| Método | Argumentos | Retorno | Descrição |
|--------|------------|---------|-----------|

---

---

### Familia

Resumo: Representa uma família dentro do sistema

Responsabilidades:

- Conhecer seus membros
- Conhecer seu identificador

Atributos:

| Atributo | Tipo | Descrição |
|----------|------|-----------|

Métodos:

| Método | Argumentos | Retorno | Descrição |
|--------|------------|---------|-----------|

---

---

### FamiliaControlador

Resumo: atender a requisições relacionadas a famílias.

Responsabilidades:

- Responder à criação de uma família
- Responder à adição de membros a uma família
- Responder à remoção de membro de uma família

Atributos:

| Atributo | Tipo | Descrição |
|----------|------|-----------|

Métodos:

| Método | Argumentos | Retorno | Descrição |
|--------|------------|---------|-----------|

---

---

### FamiliaServicos

Resumo: Realiza as operações relacionadas a famílias. Como operações CRUD ou gerenciamento de membros.

Responsabilidades:

- Gerenciar famílias(CRUD)
- Gerenciar membros(adicionar, remover)

Atributos:

| Atributo | Tipo | Descrição |
|----------|------|-----------|

Métodos:

| Método | Argumentos | Retorno | Descrição |
|--------|------------|---------|-----------|

---

---

### FamiliaRepositorio

Resumo: salva de forma persistente os dados relacionados a família

Responsabilidades:

- Realizar operações CRUD dos dados da família
- Salvar e remover os membros da família

Atributos:

| Atributo | Tipo | Descrição |
|----------|------|-----------|

Métodos:

| Método | Argumentos | Retorno | Descrição |
|--------|------------|---------|-----------|

---

---

### ListaCompras

Resumo: representa uma lista de compras dentro do sistema

Responsabilidades:

- Conhecer a descrição da lista
- Conhecer os itens da lista
- Conhecer a lista de membros que podem visualizar a lista

Atributos:

| Atributo | Tipo | Descrição |
|----------|------|-----------|

Métodos:

| Método | Argumentos | Retorno | Descrição |
|--------|------------|---------|-----------|

---

---

### ListaComprasControlador

Resumo: responde a solicitações relacionadas a lista de compras, como operações CRUD ou gerenciamento dos itens.

Responsabilidades:

- Responder a solicitações de operações CRUD
- Responder a solicitações para manipular itens da lista

Atributos:

| Atributo | Tipo | Descrição |
|----------|------|-----------|

Métodos:

| Método | Argumentos | Retorno | Descrição |
|--------|------------|---------|-----------|

---

---

### ListaComprasServicos

Resumo: realiza as operações relacionadas a lista de compras. Faz operações CRUD, gerencia os itens, realiza validações e sanitização dos dados da lista.

Responsabilidades:

- Gerenciar listas de compras(CRUD)
- Gerenciar itens da lista de compras(adição, alteração, remoção)
- Validar os dados da lista e seus itens

Atributos:

| Atributo | Tipo | Descrição |
|----------|------|-----------|

Métodos:

| Método | Argumentos | Retorno | Descrição |
|--------|------------|---------|-----------|

---

---

### ListaComprasRepositorio

Resumo: implementa o salvamento persistente dos dados das listas de compras e seus itens.

Responsabilidades:

- Realizar operações CRUD da lista
- Realizar operações CRUD dos itens da lista

Atributos:

| Atributo | Tipo | Descrição |
|----------|------|-----------|

Métodos:

| Método | Argumentos | Retorno | Descrição |
|--------|------------|---------|-----------|

---

---

### ItemListaCompras

Resumo: representa um item de uma lista de compras

Responsabilidades:

- Conhecer a descrição, quantidade e unidade do item

Atributos:

| Atributo | Tipo | Descrição |
|----------|------|-----------|

Métodos:

| Método | Argumentos | Retorno | Descrição |
|--------|------------|---------|-----------|

---

---

### LogAuditoria

### LogAuditoriaControlador

### LogAuditoriaServicos

### LogAuditoriaRepositorio

### Notificacao

### NotificacaoControlador

### NotificacaoServicos

### NotificacaoRepositorio

### PermissaoAcesso

### PermissaoAcessoControlador

### PermissaoAcessoServicos

### PermissaoAcessoRepositorio

### Usuario

### UsuarioControlador

### UsuarioServicos

### UsuarioRepositorio

---

---

## Padrões de projeto

Nesta seção serão descritos os padrões de projetos utilizados e como as classes implementam esses padrões.