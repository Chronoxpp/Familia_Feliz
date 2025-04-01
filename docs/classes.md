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

Resumo: Gerencia as requisições de autenticação no sistema, incluindo login, recuperação de senha e criptografia de senhas.

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

Resumo: representa um registro de auditória salvo pelo sistema.

Responsabilidades:

- Conhecer a ação realiza para registro.
- Conhecer o responsável pela ação e o momento em que ela foi realizada.
- Conhecer se o registro salvo é um erro ou não.

Atributos:

| Atributo | Tipo | Descrição |
|----------|------|-----------|

Métodos:

| Método | Argumentos | Retorno | Descrição |
|--------|------------|---------|-----------|

---

---

### LogAuditoriaControlador

Resumo: Responde a solicitações relacionadas a auditoria, como criação de novos logs, consulta de logs, registro de erros.

Responsabilidades:

- Responder a solicitações para criar e consultar logs.
- Responder a solicitações para registrar erros.

Atributos:

| Atributo | Tipo | Descrição |
|----------|------|-----------|

Métodos:

| Método | Argumentos | Retorno | Descrição |
|--------|------------|---------|-----------|

---

---

### LogAuditoriaServicos

Resumo: realiza operações relacionadas a logs, como criação, consulta, sanitização e organização de logs.

Responsabilidades:

- Criar logs para auditoria.
- Criar logs de erro para auditoria.
- Consultar logs registrados para auditoria.
- Sanitizar as informações contidas nos logs.

Atributos:

| Atributo | Tipo | Descrição |
|----------|------|-----------|

Métodos:

| Método | Argumentos | Retorno | Descrição |
|--------|------------|---------|-----------|

---

---

### LogAuditoriaRepositorio

Resumo: implementa o armazenamento persistente dos logs para auditoria.

Responsabilidades:

- Registrar logs de forma persistente.
- Obter logs registrados no sistema.

Atributos:

| Atributo | Tipo | Descrição |
|----------|------|-----------|

Métodos:

| Método | Argumentos | Retorno | Descrição |
|--------|------------|---------|-----------|

---

---

### Notificacao

Resumo: representa uma notificação dentro do sistema

Responsabilidades:

- Conhecer o resumo da notificação.
- Conhecer o texto do corpo da notificação.
- Conhecer a urgência da notificação.

Atributos:

| Atributo | Tipo | Descrição |
|----------|------|-----------|

Métodos:

| Método | Argumentos | Retorno | Descrição |
|--------|------------|---------|-----------|

---

---

### NotificacaoControlador

Resumo: responde a solicitações relacionadas a notificações, como enviar ou consultar notificações.

Responsabilidades:

- Responder a pedidos de envio de notificação.
- Responder a pedidos de consulta de notificações.

Atributos:

| Atributo | Tipo | Descrição |
|----------|------|-----------|

Métodos:

| Método | Argumentos | Retorno | Descrição |
|--------|------------|---------|-----------|

---

---

### NotificacaoServicos

Resumo: realiza operações relacionadas a notificações, como validação, registro, envio e consulta de notificações.

Responsabilidades:

- Validar as informações contidas nas notificações.
- Registrar notificações.
- Enviar notificações aos membros da família.
- Consultar notificações recebidas anteriormente.

Atributos:

| Atributo | Tipo | Descrição |
|----------|------|-----------|

Métodos:

| Método | Argumentos | Retorno | Descrição |
|--------|------------|---------|-----------|

---

---

### NotificacaoRepositorio

Resumo: realiza o armazenamento persistente dos dados relacionados a notificações, registrando as notificações. Também consulta os dados armazenados.

Responsabilidades:

- Registrar notificações.
- Consultar notificações registradas.

Atributos:

| Atributo | Tipo | Descrição |
|----------|------|-----------|

Métodos:

| Método | Argumentos | Retorno | Descrição |
|--------|------------|---------|-----------|

---

---

### PermissaoAcesso

Resumo: representa uma permissão de acesso a algum recurso do sistema.

Responsabilidades:

- Conhecer a descrição da permissão.
- Conhecer se o usuário inspecionado possui tal permissão.

Atributos:

| Atributo | Tipo | Descrição |
|----------|------|-----------|

Métodos:

| Método | Argumentos | Retorno | Descrição |
|--------|------------|---------|-----------|

---

---

### PermissaoAcessoServicos

Resumo: realiza operações relacionadas a permissões de acesso, como consulta e alteração das permissões de acesso de um usuário.

Responsabilidades:

- Consultar permissões de acesso de um membro da família.
- Alterar permissões de acesso de um membro da família.

Atributos:

| Atributo | Tipo | Descrição |
|----------|------|-----------|

Métodos:

| Método | Argumentos | Retorno | Descrição |
|--------|------------|---------|-----------|

---

---

### PermissaoAcessoRepositorio

Resumo: implementa o armazenamento persistente das permissões de acesso de um membro de uma família.

Responsabilidades:

- Atualizar as permissões de acesso de um membro da família.
- Consultar as permissões de acesso de um membro da família.

Atributos:

| Atributo | Tipo | Descrição |
|----------|------|-----------|

Métodos:

| Método | Argumentos | Retorno | Descrição |
|--------|------------|---------|-----------|

---

---

### Usuario

Resumo: representa um usuário do sistema, dentro do sistema.

Responsabilidades:

- Conhecer o nome do usuário.

Atributos:

| Atributo | Tipo | Descrição |
|----------|------|-----------|

Métodos:

| Método | Argumentos | Retorno | Descrição |
|--------|------------|---------|-----------|

---

---

### UsuarioControlador

Resumo: responde a solicitações relacionadas a usuários, como operações CRUD.

Responsabilidades:

- Responde a solicitações de operações CRUD.

Atributos:

| Atributo | Tipo | Descrição |
|----------|------|-----------|

Métodos:

| Método | Argumentos | Retorno | Descrição |
|--------|------------|---------|-----------|

---

---

### UsuarioServicos

Resumo: realiza operações relacionadas a usuários, como validação e operações CRUD.

Responsabilidades:

- Validar os dados do usuário.
- Sanitizar os dados do usuário.
- Realizar operações CRUD.

Atributos:

| Atributo | Tipo | Descrição |
|----------|------|-----------|

Métodos:

| Método | Argumentos | Retorno | Descrição |
|--------|------------|---------|-----------|

---

---

### UsuarioRepositorio

Resumo: implementa o mecanismo de armazenamento persistente os dados usuários do sistema.

Responsabilidades:

- Realizar operações CRUD.

Atributos:

| Atributo | Tipo | Descrição |
|----------|------|-----------|

Métodos:

| Método | Argumentos | Retorno | Descrição |
|--------|------------|---------|-----------|

---

---

## Padrões de projeto

Nesta seção serão descritos os padrões de projetos utilizados e como as classes implementam esses padrões.