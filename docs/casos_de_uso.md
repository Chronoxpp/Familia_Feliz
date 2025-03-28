# Documentação de casos de uso

## Índice

- [Voltar ao indice principal](index.md)
- [Introdução](#introdução)
- [Diagramas](#diagramas)
- [Casos de uso](#casos-de-uso)

---

## Introdução

Esta documentação descreve como se espera que o sistema se comporte do ponto de vista dos usuários.

O objetivo é demonstrar a interação entre os usuários e os recursos do sistema, permitindo visualizar seu comportamento durante diferentes cenários de uso.

---

## Diagramas

Aqui serão inseridos diagramas UML ou outros modelos visuais para representar os casos de uso e suas interações.

---

## Casos de uso

### CSUx - [Nome do Caso de Uso]

Resumo: (Breve descrição do que o caso de uso representa)

Ator Principal: (Quem inicia o processo? Ex.: Membro, Responsável, etc.)

Pré-condições: (O que deve estar em vigor antes do início do fluxo?)

Fluxo Principal: (Passo a passo do fluxo normal da interação)

Fluxos Alternativos: (Outros caminhos possíveis, caso existam)

Fluxo de Exceção: (O que acontece se algo der errado? Ex.: erro de conexão, falta de permissão)

Pós-condição: (O que deve ser verdadeiro ao final do caso de uso?)

---

---

### CSU1 - Realizar cadastro/login

Resumo:

- O usuário se cadastra na plataforma ou realiza login em uma conta existente.

Ator Principal:

Usuário

Pré-condições:

- O usuário precisa de acesso à internet para logar ou se cadastrar na plataforma.

**Fluxo Principal:**

| Usuário                        | Sistema                                                                                     |
|--------------------------------|---------------------------------------------------------------------------------------------|
| Tenta acessar a plataforma     | Verifica se existe uma sessão ativa e, caso contrário, exibe as opções de login e cadastro. |
| Decide realizar cadastro       | Disponibiliza um formulário com campos obrigatórios (nome completo, idade, email e senha)   |
| Preenche os campos e confirma  | Valida os dados inseridos e informa eventuais erros antes da confirmação final              |
|                                | Exibe os dados informados para revisão e solicita uma nova confirmação                      |
| Revisa e confirma o cadastro 	 | Registra os dados, gera um identificador único e exibe a mensagem de sucesso                |
|                                | Redireciona para o fluxo de criação ou participação em uma família.                         |

**Fluxos Alternativos:**

FA1 - Existe uma sessão de login ativa

- O sistema verifica se o usuário ja participa de uma família. Caso participe será redirecionado ao Home do App. Caso contrario, será redirecionado para criar ou participar de uma família.

FA2 - O usuário decide realizar login

- O sistema solicita o nome de usuário ou email, e senha de acesso.
- O usuário informa os dados solicitados e confirma o login.
- O sistema valida as credenciais informadas, cria um sessão de login e o fluxo continua no FA1.

**Fluxo de Exceção:**

FE1 - O usuário não informa todos os dados obrigatórios ao se cadastrar

- O sistema informa quais dados estão faltando e solicita o preenchimento.
- O usuário informa os dados indicados e tenta novamente.

FE2 - O usuário informa um email que está em uso ao se cadastrar

- O sistema informa que o email inserido não está disponível e solicita a alteração.
- O usuário altera o email e tenta novamente

FE3 - O usuário informa dados inválidos ao se cadastrar

- O sistema informa quais dados estão inválidos e solicita a correção
- O usuário corrige os dados e tenta novamente

FE4 - O usuário informa credenciais invalidas ao realizar login

- O sistema informa que as credências não estão corretas e permite uma nova tentativa de login.
- O usuário verifica suas credenciais e tenta realizar login novamente.

Pós-condição:

- O usuário possui uma nova conta na plataforma ou acessa uma conta existente.

---

---

### CSU2 - Participar de uma família

Resumo:

- O usuário participa de uma família existente

Ator Principal:

- Usuário

Pré-condições:

- O usuário deve possuir uma conta na plataforma
- O usuário deve possuir uma sessão de login ativa

Fluxo Principal:

| Usuário                                         | Sistema                                                                                                                   |
|-------------------------------------------------|---------------------------------------------------------------------------------------------------------------------------|
| Solicita participar de uma família              | Oferece participação por código ou por link                                                                               |
| Insere o código ou o link da família e confirma | Valida o código ou link, se o código ou link existirem redireciona o usuário para o Home do App e expira o link ou código |

Fluxos Alternativos:

Fluxo de Exceção:

FE1 - Código ou link inválido

- O sistema informa que o código ou link informado expirou ou é invalido
- O sistema permite que o usuário tente novamente

Pós-condição:

- O usuário agora é membro de uma família.

---

---

### CSU3 - Criar uma família

Resumo:

- O usuário cria uma nova família

Ator Principal:

- Usuário

Pré-condições:

- O usuário deve estar cadastrado no sistema
- O usuário deve possuir uma sessão de login ativa

Fluxo Principal:

| Usuário                           | Sistema                                                                                             |
|-----------------------------------|-----------------------------------------------------------------------------------------------------|
| Solicita a criação de uma família | Verifica se o usuário possui a validação do seu email e é maior de idade                            | 
|                                   | Solicita o nome da nova família                                                                     |
| Informa o nome e confirma         | Cria uma nova família, adiciona o usuário como responsável e redireciona o mesmo para o Home do App |

Fluxos Alternativos:

Fluxo de Exceção:

FE1 - O usuário não validou o email da conta

- O sistema informa que para criar uma família o email da conta deve ser validado e oferece ao usuário a opção de validar email
- O usuário valida o email e tenta novamente

FE2 - O usuário não é maior de idade

- O sistema informa que para criar uma família é necessário ser maior de idade e cancela a operação

FE3 - Erro ao criar a família

- O sistema informa que ocorreu um erro inesperado ao criar a família e permite que o usuário tente novamente.

Pós-condição:

- Uma nova família é criada e o usuário é seu responsável

---

---

### CSU4 - Adicionar novo membro na família

Resumo:

- Um responsável da família adiciona um novo membro na família.

Ator Principal:

- Responsável da família

Pré-condições:

- O usuário deve ser um dos responsáveis da família

Fluxo Principal:

| Responsável                                    | Sistema                                                |
|------------------------------------------------|--------------------------------------------------------|
| Solicita a adição de um novo membro na família | Pergunta se o novo membro é maior idade                |
| Informa que é que maior de idade               | Gera e exibe um código de acesso válido por 1 hora     |
| Envia o código de acesso ao novo membro        | Aguarda o novo membro utilizar o código para ingresso  |

Fluxos Alternativos:

FA1 - O novo membro é um menor de idade

- O sistema inicia o CSU5 para cadastrar o menor de idade

Fluxo de Exceção:

FE1 - Erro ao gerar o código de acesso

- O sistema informa que ocorreu um erro inesperado e permite que o usuário tente novamente

FE2 - O usuário não é um responsável pela família

- O sistema informa que apenas os responsáveis da família podem adicionar novos membros e cancela a operação

Pós-condição:

Um novo membro é adicionado a família do responsável

---

---

### CSU5 - Adicionar um membro menor de idade na família

Resumo:

- Um responsável adiciona um menor de idade na família.

Ator Principal:

- Responsável da família

Pré-condições:

- O usuário deve ser um responsável da família

Fluxo Principal:

| Responsável                                       | Sistema                                                                                                                        |
|---------------------------------------------------|--------------------------------------------------------------------------------------------------------------------------------|
| Solicita a adição de um menor de idade na família | Solicita os dados do menor de idade(Nome completo, idade)                                                                      |
| Informa os dados e confirma                       | Valida os dados e cadastra o novo membro                                                                                       | 
|                                                   | Disponibiliza um link de uso único com validade de uma hora que deve ser utilizado pelo menor idade para participar da família |

Fluxos Alternativos:

Fluxo de Exceção:

FE1 - O responsável informa dados inválidos

- O sistema indica quais dados estão inválidos e solicita a correção
- O responsável corrige os dados e tenta novamente

FE2 - O link expira sem ser usado

- O sistema deleta o link e o novo membro da base de dados

FE3 - Erro ao gerar o link ou cadastrar o novo membro

- O sistema informa que ocorreu um inesperado ao adicionar o novo membro e permite que o usuário tente novamente

Pós-condição:

Um novo membro menor de idade é adicionado a família

---

---

### CSU6 - Criar lista de compras

Resumo:

- Um membro da família cria uma nova lista de compras.

Ator Principal:

- Membro da família

Pré-condições:

- O membro deve possuir permissão para criar listas de compras

Fluxo Principal:

| Membro da família                                           | Sistema                                                                                                                          |
|-------------------------------------------------------------|----------------------------------------------------------------------------------------------------------------------------------|
| Solicita a criação de uma nova lista de compras             | Verifica se o usuário possui permissão para criar listas de compras                                                              |
|                                                             | Disponibiliza um formulário para o usuário informa a descrição da lista, adicionar produtos e configurar a visibilidade da lista |
| Informa os dados e os itens da lista, e confirma o cadastro | Valida a lista de compras, realiza o cadastro e envia uma notificação aos membros da família                                     |

Fluxos Alternativos:

Fluxo de Exceção:

FE1 - O usuário não informa uma descrição para a lista

- O sistema informa que a descrição deve ser informada
- O usuário informa a descrição da lista e tenta novamente

FE2 - Erro ao registrar a lista de compras

- O sistema informa que ocorreu um erro inesperado ao criar a lista de compras e permite que o usuário tente novamente

Pós-condição:

Uma nova lista de compras é registrada e disponível para uso.

---

---

### CSU7 - Adicionar item na lista de compras

Resumo:

- Um membro da família adiciona um novo item em uma lista de compras.

Ator Principal:

- Membro da família

Pré-condições:

- O usuário deve possuir permissão para adicionar itens na lista
- O usuário deve estar acessando uma lista de compras

Fluxo Principal:

| Usuário                                      | Sistema                                                |
|----------------------------------------------|--------------------------------------------------------|
| Solicita a adição de um novo item na lista   | Solicita a descrição, unidade e quantidade do item     |
| Informa os dados do item e confirma          | Valida os dados, adiciona o item e confirma a operação |

Fluxos Alternativos:

Fluxo de Exceção:

FE1 - Informado dados inválidos

- O sistema informa quais dados estão inválidos e solicita a correção
- O usuário corrige os dados e tenta novamente

FE2 - Erro ao adicionar item

- O sistema informa que ocorreu um erro inesperado ao adicionar o item e permite que o usuário tente novamente.

Pós-condição:

 - Um novo item é adiciona na lista

---

---

### CSU8 - Alterar item na lista de compras

Resumo:

- Um membro da família altera os dados de item de uma lista de compras.

Ator Principal:

- Membro da família

Pré-condições:

- O usuário deve estar acessando a lista
- O usuário deve possuir permissão para alterar itens na lista de compras

Fluxo Principal:

| Usuário                                  | Sistema                                                             |
|------------------------------------------|---------------------------------------------------------------------|
| Solicita a alteração de um item da lista | Verifica a permissão para editar itens da lista de compras          |
|                                          | Exibe um formulário com os dados do item e libera a alteração       |
| Altera os dados desejados e confirma     | Valida os dados do item, aplica as alterações e confirma a operação |

Fluxos Alternativos:

FA1 - O usuário marca ou desmarca, um ou mais itens como comprados

- O sistema permite que o usuário salve as alterações
- O usuário confirma o salvamento
- O sistema salva as alterações e confirma a operação

Fluxo de Exceção:

FE1 - Item com dados inválidos

- O sistema informa quais dados estão inválidos e solicita a correção
- O usuário corrige os dados e tenta novamente

FE2 - Erro ao salvar as alterações

- O sistema informa que ocorreu um erro inesperado e permite que o usuário tente novamente

FE3 - O usuário não possui permissão para alterar itens da lista de compras

- O sistema informa que o usuário não possui permissão para alterar itens da lista de compras e cancela a operação

Pós-condição:

- Os dados do item são alterados
- Os itens ficam marcados ou desmarcado como comprados

---

---

### CSU9 - Remover item da lista de compras

Resumo:

- Um membro da família remove um item da lista de compras

Ator Principal:

- Membro da família

Pré-condições:

- O usuário deve possuir permissão para deletar itens da lista de compras
- O usuário deve estar acessando uma lista de compras

Fluxo Principal:

| Membro da família              | Sistema                                                                                                    |
|--------------------------------|------------------------------------------------------------------------------------------------------------|
| Solicita a exclusão de um item | Verifica se o usuário possui permissão para deletar itens da lista                                         |
|                                | Informa que o item a exclusão não pode ser revertida, permite que o usuário confiram ou cancele a operação |
| Confirma a operação            | Deleta o item selecionado e confirma a operação                                                            |

Fluxos Alternativos:

FA1 - O usuário cancela a exclusão

- O sistema retorna a visualização da lista de compras e informa que o item não foi deletado

Fluxo de Exceção:

FE1 - O usuário não possui permissão para deletar itens da lista de compras

- O sistema informa que o usuário não possui permissão para deletar itens da lista de compras e cancela a operação.

FE2 - Erro ao remover item

- O sistema informa que o ocorreu um erro inesperado ao remover o item da lista de compras e permite que o usuário tente novamente

Pós-condição:

- Um item é removido da lista de compras

---

---

### CSU10 - Alterar lista de compras

Resumo:

- Um membro altera uma lista de compras, modificando coisas como itens, descrição, visibilidade, etc.

Ator Principal:

- Membro da família

Pré-condições:

- O usuário deve possuir permissão para alterar a lista de compras

Fluxo Principal:

| Membro da família                                       | Sistema                                                                                                                                                                                                                                                                                                                                                                                                           |
|---------------------------------------------------------|-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| Solicita a edição de lista de compras                   | Verifica se o usuário possui permissão para alterar listas de compras                                                                                                                                                                                                                                                                                                                                             |
|                                                         | Libera a alteração dos dados e itens da lista. O [CSU7](#csu7---adicionar-item-na-lista-de-compras)  é acionado para adicionar itens, o [CSU8](#csu8---alterar-item-na-lista-de-compras) é acionado para alterar itens, o [CSU9](#csu9---remover-item-da-lista-de-compras) é acionado para deletar itens, o [CSU13](#csu13---alterar-visibilidade-da-lista-de-compras) é acionado alterar a visibilidade de lista |
| Altera os dados e itens desejados e confirma a operação | Valida os dados da lista, aplica as alterações e confirma a operação                                                                                                                                                                                                                                                                                                                                              |

Fluxos Alternativos:

Fluxo de Exceção:

FE1 - O usuário não possui permissão alterar listas de compras

- O sistema informa que o usuário não possui permissão para alterar a lista de compras e cancela a operação

FE2 - Informado dados inválidos

- O sistema informa quais dados estão inválidos e solicita a correção
- O usuário corrige os dados e tenta novamente

FE3 - Erro ao salvar a alteração dos dados da lista

- O sistema informa que ocorreu um erro inesperado ao salvar os dados da lista e permite que o usuário tente novamente

Pós-condição:

- A lista de compras é alterada conforme os dados inseridos/definidos pelo usuário

---

---

### CSU11 - Consultar lista de compras

Resumo:

- Um membro da família consulta uma lista de compras previamente registrada.

Ator Principal:

Pré-condições:

Fluxo Principal:

Fluxos Alternativos:

Fluxo de Exceção:

Pós-condição:

---

---

### CSU 12 - Deletar lista de compras

Resumo:

- Um membro da família deleta uma lista de compras

Ator Principal:

Pré-condições:

Fluxo Principal:

Fluxos Alternativos:

Fluxo de Exceção:

Pós-condição:

---

---

### CSU13 - Alterar visibilidade da lista de compras

Resumo:

- Um membro da família altera quem pode visualizar uma lista de compras.

Ator Principal:

Pré-condições:

Fluxo Principal:

Fluxos Alternativos:

Fluxo de Exceção:

Pós-condição:

---

---

### CSU14 - Definir responsáveis de uma lista de compras

Resumo:

- Um membro da família define os responsáveis por uma lista de compras.

Ator Principal:

Pré-condições:

Fluxo Principal:

Fluxos Alternativos:

Fluxo de Exceção:

Pós-condição:

---

---

### CSU15 - Definir permissões de acesso

Resumo:

- Um responsável define as permissões de acesso aos membros da família.

Ator Principal:

Pré-condições:

Fluxo Principal:

Fluxos Alternativos:

Fluxo de Exceção:

Pós-condição:

---

---

### CSU 16 - Enviar notificação

Resumo: 

- Um membro da família envia uma notificação, contendo uma mensagem personalizada, ao outros membros.

Ator Principal:

Pré-condições:

Fluxo Principal:

Fluxos Alternativos:

Fluxo de Exceção:

Pós-condição:

---