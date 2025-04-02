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

Resumo: gerencia as requisições de autenticação no sistema, incluindo login, recuperação de senha.

Responsabilidades:

- Atender requisições para autenticar usuários.

Atributos:

| Atributo | Tipo | Descrição |
|----------|------|-----------|

Métodos:

| Método        | Argumentos                                      | Retorno | Descrição                                         |
|---------------|-------------------------------------------------|---------|---------------------------------------------------|
| realizarLogin | nomeUsuario:String, email:String, senha:String  | boolean | permite que o usuário realize login na plataforma |

---

---

### AutenticacaoServicos

Resumo: realizar serviços relacionados a autenticação, incluindo autenticação de usuário, geração de tokens, e recuperação de senhas.

Responsabilidades:

- Autenticar usuários.

Atributos:

| Atributo | Tipo | Descrição |
|----------|------|-----------|

Métodos:

| Método        | Argumentos                                     | Retorno | Descrição                                   |
|---------------|------------------------------------------------|---------|---------------------------------------------|
| realizarLogin | nomeUsuario:String, email:String, senha:String | boolean | realiza o login de um usuário na plataforma |

---

---

### EmailServicos

Resumo: realiza operações relacionadas a email, como validação de endereços de email e envio de emails.

Responsabilidades:

- Validar endereço de email.
- Enviar email.

Atributos:

| Atributo | Tipo | Descrição |
|----------|------|-----------|

Métodos:

| Método               | Argumentos   | Retorno | Descrição                   |
|----------------------|--------------|---------|-----------------------------|
| validarEnderecoEmail | email:String | boolean | Valida um endereço de email |

---

---

### Familia

Resumo: representa uma família dentro do sistema

Responsabilidades:

- Conhecer seus membros.
- Conhecer seu identificador.

Atributos:

| Atributo  | Tipo    | Descrição                |
|-----------|---------|--------------------------|
| membros   | array   | Membros da família       |
| id        | integer | Identificador da família |
| descricao | String  | Nome da família          |

Métodos:

| Método | Argumentos | Retorno | Descrição |
|--------|------------|---------|-----------|

---

---

### FamiliaControlador

Resumo: atende a requisições relacionadas a famílias.

Responsabilidades:

- Responder à solicitação para criação de uma família.
- Responder à solicitação de adição de membros a família.
- Responder à solicitação de remoção de membros da família.

Atributos:

| Atributo | Tipo | Descrição |
|----------|------|-----------|

Métodos:

| Método            | Argumentos                  | Retorno        | Descrição                                              |
|-------------------|-----------------------------|----------------|--------------------------------------------------------|
| registrarFamilia  | descricao:String            | familia:Array  | Registra uma família no sistema                        |
| alterarFamilia    | familia:Array               | familia:Array  | Altera os dados de uma família no sistema              |
| consultarFamilias | usuario:Array               | familias:Array | Retorna as famílias vinculadas a um usuário no sistema |
| adicionarMembro   | membro:Array, familia:Array | familia:Array  | Adiciona um membro na família                          |
| removerMembro     | membro:Array, familia:Array | familia:Array  | Remove um membro da família                            |

---

---

### FamiliaServicos

Resumo: realiza as operações relacionadas a famílias. Como operações CRUD ou gerenciamento de membros.

Responsabilidades:

- Gerenciar famílias(CRUD)
- Gerenciar membros(adicionar, remover)

Atributos:

| Atributo | Tipo | Descrição |
|----------|------|-----------|

Métodos:

| Método            | Argumentos                      | Retorno         | Descrição                                                |
|-------------------|---------------------------------|-----------------|----------------------------------------------------------|
| registrarFamilia  | descricao:String                | familia:Familia | Registra uma família no sistema                          |
| removerFamilia    | familia:Familia                 | boolean         | Remove uma família do sistema                            |
| alterarFamilia    | familia:Familia                 | familia:Familia | Altera os dados de uma familia no sistema                |
| consultarFamilias | usuario:Usuario                 | familias:Array  | Consulta as famílias vinculadas a um usuário do sistema  |
| adicionarMembro   | membro:Usuario, familia:Familia | familia:Familia | Adiciona um membro na família                            |
| removerMembro     | membro:Usuario, familia:Familia | Familia:Familia | Remove um membro da família                              |

---

---

### FamiliaRepositorio

Resumo: implementa o mencanismo de armazenamento persistente dos dados relacionados a família.

Responsabilidades:

- Realizar operações CRUD.
- Salvar e remover os membros da família.

Atributos:

| Atributo | Tipo | Descrição |
|----------|------|-----------|

Métodos:

| Método             | Argumentos                      | Retorno         | Descrição                                               |
|--------------------|---------------------------------|-----------------|---------------------------------------------------------|
| registrarFamilia   | descricao:String                | familia:Familia | Registra uma família no sistema                         |
| removerFamilia     | familia:Familia                 | boolean         | Remove uma família do sistema                           |
| alterarFamilia     | familia:Familia                 | familia:Familia | Altera os dados de uma familia no sistema               |
| consultarFamilias  | membro:Usuario                  | familias:array  | Consulta as famílias vinculadas a um usuário do sistema |
| adicionarMembro    | membro:Usuario, familia:Familia | familia:Familia | Adiciona um membro na família                           |
| removerMembro      | membro:Usuario, familia:Familia | familia:Familia | Remove um membro da família                             |

---

---

### ListaCompras

Resumo: representa uma lista de compras no sistema.

Responsabilidades:

- Conhecer a descrição da lista.
- Conhecer os itens da lista.
- Conhecer a lista de membros que podem visualizar a lista.

Atributos:

| Atributo | Tipo | Descrição |
|----------|------|-----------|

Métodos:

| Método | Argumentos | Retorno | Descrição |
|--------|------------|---------|-----------|

---

---

### ListaComprasControlador

Resumo: responde a solicitações relacionadas a lista de compras, incluindo operações CRUD e gerenciamento dos itens.

Responsabilidades:

- Responder a solicitações de operações CRUD.
- Responder a solicitações para gerenciar itens da lista.

Atributos:

| Atributo | Tipo | Descrição |
|----------|------|-----------|

Métodos:

| Método | Argumentos | Retorno | Descrição |
|--------|------------|---------|-----------|

---

---

### ListaComprasServicos

Resumo: realiza as operações relacionadas a lista de compras, incluindo operações CRUD, gerenciamento dos itens, e validações.

Responsabilidades:

- Gerenciar listas de compras(CRUD).
- Gerenciar itens das listas(CRUD).
- Validar os dados da lista e seus itens.

Atributos:

| Atributo | Tipo | Descrição |
|----------|------|-----------|

Métodos:

| Método | Argumentos | Retorno | Descrição |
|--------|------------|---------|-----------|

---

---

### ListaComprasRepositorio

Resumo: implementa o mecanismo de armazenamento persistente dos dados da lista de compras.

Responsabilidades:

- Realizar operações CRUD da lista
- Realizar operações CRUD dos itens da lista.

Atributos:

| Atributo | Tipo | Descrição |
|----------|------|-----------|

Métodos:

| Método | Argumentos | Retorno | Descrição |
|--------|------------|---------|-----------|

---

---

### ItemListaCompras

Resumo: representa um item de uma lista de compras.

Responsabilidades:

- Conhecer a descrição, quantidade e unidade do item.

Atributos:

| Atributo | Tipo | Descrição |
|----------|------|-----------|

Métodos:

| Método | Argumentos | Retorno | Descrição |
|--------|------------|---------|-----------|

---

---

### LogAuditoria

Resumo: representa um registro de uma ação ou reação ocorrida no sistema para fins de auditoria.

Responsabilidades:

- Conhecer a ação ou reação ocorrida para registro.
- Conhecer o responsável pela ação/reação.
- Conhecer o momento em que a ação/reação ocorreu.
- Reconhecer o registro log de erro ou log comum.

Atributos:

| Atributo | Tipo | Descrição |
|----------|------|-----------|

Métodos:

| Método | Argumentos | Retorno | Descrição |
|--------|------------|---------|-----------|

---

---

### LogAuditoriaControlador

Resumo: responde a solicitações relacionadas a auditoria, incluindo registro e consulta de logs.

Responsabilidades:

- Responder a solicitações para registrar e consultar logs.

Atributos:

| Atributo | Tipo | Descrição |
|----------|------|-----------|

Métodos:

| Método | Argumentos | Retorno | Descrição |
|--------|------------|---------|-----------|

---

---

### LogAuditoriaServicos

Resumo: realiza operações relacionadas a auditoria, incluindo registro, consulta, sanitização e organização de logs.

Responsabilidades:

- Registrar logs para auditoria.
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

Resumo: implementa o mecanismo de armazenamento persistente dos logs para auditoria.

Responsabilidades:

- Registrar logs de forma persistente.
- Consultar logs registrados no sistema.

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

Resumo: responde a solicitações relacionadas a notificações, incluindo enviar ou consultar notificações.

Responsabilidades:

- Responder a solicitações de envio de notificação.
- Responder a solicitações de consulta de notificações.

Atributos:

| Atributo | Tipo | Descrição |
|----------|------|-----------|

Métodos:

| Método | Argumentos | Retorno | Descrição |
|--------|------------|---------|-----------|

---

---

### NotificacaoServicos

Resumo: realiza operações relacionadas a notificações, incluindo validação, registro, envio e consulta de notificações.

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

Resumo: implementa o mecanismo de armazenamento persistente dos dados relacionados a notificações, limita a registro e consulta de notificações

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

Atributos:

| Atributo | Tipo | Descrição |
|----------|------|-----------|

Métodos:

| Método | Argumentos | Retorno | Descrição |
|--------|------------|---------|-----------|

---

---

### PermissaoAcessoServicos

Resumo: realiza operações relacionadas a permissões de acesso, incluindo consulta e alteração das permissões de um usuário.

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

Resumo: implementa o mecanismo de armazenamento persistente das permissões de acesso de um membro de uma família.

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

Resumo: representa um usuário do sistema.

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

Resumo: responde a solicitações relacionadas a usuários, incluindo operações CRUD e gerenciamento de permissões de acesso.

Responsabilidades:

- Responde a solicitações de operações CRUD.
- Responde a solicitações de gerenciamento de permissões de acesso.

Atributos:

| Atributo | Tipo | Descrição |
|----------|------|-----------|

Métodos:

| Método | Argumentos | Retorno | Descrição |
|--------|------------|---------|-----------|

---

---

### UsuarioServicos

Resumo: realiza operações relacionadas a usuários, incluindo validação e operações CRUD.

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

Resumo: implementa o mecanismo de armazenamento persistente dos dados dos usuários.

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