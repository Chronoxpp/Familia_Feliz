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

| Usuário                        | Sistema                                                                                                |
|--------------------------------|--------------------------------------------------------------------------------------------------------|
| Tenta acessar a plataforma     | Verifica se existe uma sessão ativa e, caso contrário, exibe as opções de login e cadastro             |
| Decide realizar cadastro       | Disponibiliza um formulário com campos obrigatórios (nome completo, data de nascimento, email e senha) |
| Preenche os campos e confirma  | Valida os dados inseridos e informa eventuais erros antes da confirmação final                         |
|                                | Exibe os dados informados para revisão e solicita uma nova confirmação                                 |
| Revisa e confirma o cadastro 	 | Registra os dados, gera um identificador único e exibe a mensagem de sucesso                           |
|                                | Envia um email de verificação e solicita a confirmação para ativar a conta                             |
| Confirma o email               | Ativa a conta e redireciona para o fluxo de criação ou participação em uma família                     |

**Fluxos Alternativos:**

FA1 - Existe uma sessão de login ativa

- O sistema verifica se o usuário ja participa de uma família.
  - Se sim, redireciona para a tela inicial do aplicativo.
  - Se não, redireciona para a tela de criação ou participação em uma família.

FA2 - O usuário decide realizar login

- O sistema solicita o nome de usuário ou email, e senha de acesso.
- O usuário informa os dados solicitados e confirma o login.
- O sistema valida as credenciais informadas e cria uma sessão de login.
- O fluxo continua no FA1.

FA3 - O usuário esqueceu a senha

- O sistema oferece uma opção de recuperação de senha.
- O usuário informa o email cadastrado.
- O sistema envia um email com um link para redefinição de senha.
- O usuário acessa o link, define uma nova senha e confirma.
- O sistema atualiza a senha e redireciona para a tela de login.

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

- O usuário possui uma nova conta na plataforma ou acessa uma conta existente com sucesso.

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
- O usuário deve ter validado o email cadastrado
- O usuário deve ser maior de idade

Fluxo Principal:

| Usuário                           | Sistema                                                                                     |
|-----------------------------------|---------------------------------------------------------------------------------------------|
| Solicita a criação de uma família | Verifica se o usuário possui a validação do seu email e é maior de idade                    | 
|                                   | Solicita o nome da nova família                                                             |
| Informa o nome e confirma         | Valida o nome informado                                                                     |
|                                   | Cria uma nova família, adiciona o usuário como responsável e gera um código/link de convite |
|                                   | Redireciona o usuário para o Home do App                                                    |

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
- O usuário pode configurar e convidar membros para a família imediatamente

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

| Responsável                                    | Sistema                                                                                                                                                   |
|------------------------------------------------|-----------------------------------------------------------------------------------------------------------------------------------------------------------|
| Solicita a adição de um novo membro na família | Pergunta se o novo membro é maior idade                                                                                                                   |
| Informa que é que maior de idade               | Gera e exibe um código de acesso válido por 1 hora                                                                                                        |
| Envia o código de acesso ao novo membro        | Aguarda o novo membro utilizar o código para ingresso                                                                                                     |
|                                                | Quando o novo usuário usar o link, os responsáveis da família são notificados. Caso o código expire, os responsáveis são notificados que o código expirou |

Fluxos Alternativos:

FA1 - O novo membro é um menor de idade

- O sistema inicia o CSU5 para cadastrar o menor de idade

Fluxo de Exceção:

FE1 - Erro ao gerar o código de acesso

- O sistema informa que ocorreu um erro inesperado e permite que o usuário tente novamente

FE2 - O usuário não é um responsável pela família

- O sistema informa que apenas os responsáveis da família podem adicionar novos membros e cancela a operação

FE3 - O código/link expirou antes de ser utilizado

- O sistema informa que o código expirou e permite a geração de um novo
- O responsável pode reenviar o novo código ao membro

FE4 - O novo membro já faz parte da família

O sistema informa que o usuário já é membro da família e impede a repetição da solicitação

Pós-condição:

Um novo membro é adicionado à família do responsável

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

| Membro da família                                | Sistema                                                                                                                          |
|--------------------------------------------------|----------------------------------------------------------------------------------------------------------------------------------|
| Solicita a criação de uma nova lista de compras  | Verifica se o usuário possui permissão para criar listas de compras                                                              |
|                                                  | Disponibiliza um formulário para o usuário informa a descrição da lista, adicionar produtos e configurar a visibilidade da lista |
| Informa os dados e os itens da lista, e confirma | Valida os dados fornecidos e exibe um resumo para revisão                                                                        |
| Confirma a criação da lista                      | Valida a lista, registra a lista de compras e envia uma notificação aos membros da família                                       |

Fluxos Alternativos:

FA1 - O usuário deseja importar itens de uma lista anterior

- O sistema oferece a opção de reutilizar itens de listas anteriores
- O usuário seleciona uma lista existente e os itens são adicionados automaticamente.
- O usuário pode revisar e editar os itens antes de confirmar a criação.

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

FE2 - O item já existe na lista

-  sistema informa que o item já está na lista e permite alterar o item presente se o usuário possuir permissão.

FE3 - Erro ao adicionar item

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

| Membro da família              | Sistema                                                                |
|--------------------------------|------------------------------------------------------------------------|
| Solicita a exclusão de um item | Verifica se o usuário possui permissão para deletar itens da lista     |
|                                | Informa que a exclusão não pode ser revertida e solicita a confirmação |
| Confirma a operação            | Deleta o item selecionado e confirma a operação                        |

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
- O usuário deve estar acessando uma lista de compras

Fluxo Principal:

| Membro da família                                       | Sistema                                                               |
|---------------------------------------------------------|-----------------------------------------------------------------------|
| Solicita a edição de lista de compras                   | Verifica se o usuário possui permissão para alterar listas de compras |
|                                                         | Libera a alteração dos dados e itens da lista                         |
| Altera os dados e itens desejados e confirma a operação | Valida os dados da lista, aplica as alterações e confirma a operação  |

Fluxos Alternativos:

FA1 - O usuário deseja adicionar um item à lista

- O sistema aciona o [CSU7](#csu7---adicionar-item-na-lista-de-compras)
  
FA2 - O usuário deseja modificar um item da lista

- O sistema aciona o [CSU8](#csu8---alterar-item-na-lista-de-compras)

FA3 - O usuário deseja remover um item da lista

- O sistema aciona o [CSU9](#csu9---remover-item-da-lista-de-compras)

FA4 - O usuário deseja alterar a visibilidade da lista

- O sistema aciona o [CSU13](#csu13---alterar-visibilidade-da-lista-de-compras)

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

- Membro da família

Pré-condições:

- O usuário deve possuir permissão para consultar listas de compras

Fluxo Principal:

| Membro da família                                     | Sistema                                                                |
|-------------------------------------------------------|------------------------------------------------------------------------|
| Solicita a consulta das listas de compras disponíveis | Verifica se o usuário possui permissão para consultar as listas        |
|                                                       | Recupera e exibe as listas que o usuário pode visualizar               |
| Seleciona uma lista                                   | Carrega e exibe a lista em detalhes, permitindo que outros CSU iniciem |

Fluxos Alternativos:

FA1 - Nenhuma lista de compras disponível para o usuário

- O sistema informa que não há listas de compras disponíveis para consulta.

Fluxo de Exceção:

FE1 - O usuário não possui permissão para consultar listas de compras

- O sistema informa que o usuário não possuir permissão para consultar listas de compras e cancela a operação.

FE2 - Erro carregar as listas disponíveis

- O sistema informa que ocorreu um erro inesperado ao consultar as listas e permite que o usuário tente novamente

FE3 - Erro ao carregar a lista selecionada

- O sistema informa que ocorreu um erro inesperado ao carregar a lista selecionada e permite que o usuário tente novamente

Pós-condição:

- O usuário visualiza as listas disponíveis e pode acessar os detalhes de uma lista específica 

---

---

### CSU 12 - Deletar lista de compras

Resumo:

- Um membro da família remove permanentemente uma lista de compras do sistema.

Ator Principal:

- Membro da família

Pré-condições:

- O usuário deve possuir permissão para deletar listas de compras
- O usuário deve estar visualizando a lista que deseja deletar

Fluxo Principal:

| Membro da família                       | Sistema                                                                         |
|-----------------------------------------|---------------------------------------------------------------------------------|
| Solicita a exclusão da lista de compras | Verifica se o usuário possui permissão para deletar listas de compras           |
|                                         | Exibe um alerta informando que a exclusão é irreversível e solicita confirmação |
| Confirma a exclusão                     | Deleta a lista de compras e redireciona o usuário para a tela consulta          |

Fluxos Alternativos:

FA1 - O usuário cancela a exclusão da lista

- O sistema retorna a visualização da lista e informa que a exclusão da lista foi cancelada

Fluxo de Exceção:

FE1 - O usuário não possui permissão para deletar listas de compras

- O sistema informa que o usuário não possui permissão para deletar listas de compras e cancela a operação

FE2 - Erro ao deletar a lista de compras

- O sistema informa que ocorreu um erro inesperado ao deletar a lista de compras e permite que o usuário tente novamente

Pós-condição:

- Uma lista de compras é deletada do sistema

---

---

### CSU13 - Alterar visibilidade da lista de compras

Resumo:

- Um membro da família modifica a lista de usuários que podem visualizar uma lista de compras

Ator Principal:

- Membro da família

Pré-condições:

- O usuário deve possuir permissão para alterar a visibilidade de lista de compras
- O usuário não poder remover a visibilidade dos responsáveis da família
- O usuário deve estar acessando uma lista de compras

Fluxo Principal:

| Membro da família                                          | Sistema                                                                                                    |
|------------------------------------------------------------|------------------------------------------------------------------------------------------------------------|
| Solicita a alteração da visibilidade da lista de compras   | Verifica se o usuário possui permissão para alterar a visibilidade da lista de compras                     |
|                                                            | Exibe a lista atual de membros com acesso e permite a modificação dos membros não responsáveis da família  |
| Altera os membros que podem visualizar a lista e confirma  | Valida a lista de usuários selecionados, altera a visibilidade da lista e confirma a operação              |

Fluxos Alternativos:

Fluxo de Exceção:

FE1 - O usuário não possui permissão para alterar a visibilidade da lista de compras

- O sistema informa que o usuário não possui permissão para alterar a visibilidade da lista de compras e cancela a operação

FE2 - O usuário tenta remover a visibilidade de responsáveis da família

- O sistema informa que os responsáveis da família sempre podem visualizar as listas e impede a remoção desses membros

FE3 - Erro ao salvar a nova configuração de visibilidade

- O sistema informa que ocorreu um erro inesperado ao alterar a visibilidade da lista e permite que o usuário tente novamente

Pós-condição:

- A lista de membros com permissão para visualizar a lista de compras é atualizada

---

---

### CSU14 - Definir permissões de acesso

Resumo:

- Um responsável da família gerencia as permissões de acesso dos membros da família

Ator Principal:

- Responsável da família

Pré-condições:

- O usuário deve ser um responsável da família

Fluxo Principal:

| Responsável da família                        | Sistema                                           |
|-----------------------------------------------|---------------------------------------------------|
| Solicita a alteração das permissões de acesso | Verifica se o usuário é um responsável da família |
|                                               | Exibe uma lista de membros da família disponíveis |
| Seleciona um membro da lista                  | Exibe as permissões atuais e habilita a alteração |
| Altera as permissões e confirma               | Salva as alterações e confirma a operação         |

Fluxos Alternativos:

Fluxo de Exceção:

FE1 - O usuário não é um responsável da família

- O sistema informa que o usuário não é um responsável da família e cancela a operação

FE2 - Erro ao salvar as alterações

- O sistema informa que ocorreu um erro inesperado ao salvar as alterações e permite que o usuário tente novamente

Pós-condição:

- As permissões de acesso de um dos membros da família são alteradas

---

---

### CSU 15 - Enviar notificação

Resumo: 

- Um membro da família envia uma notificação personalizada ao outros membros da família.

Ator Principal:

- Membro da família

Pré-condições:

Fluxo Principal:

| Membro da família                                  | Sistema                                                                                    |
|----------------------------------------------------|--------------------------------------------------------------------------------------------|
| Solicita o envio de uma notificação para a família | Abre um formulário onde o usuário pode inserir um título, resumo e o corpo da notificação  |
| Informa os dados no formulário e confirma          | Valida os dados informados                                                                 |
|                                                    | Envia uma notificação, dentro da plataforma, aos membros da família e confirma a operação  |

Fluxos Alternativos:

Fluxo de Exceção:

FE1 - Informado dados inválidos

- O sistema informa quais dados estão inválidos e solicita a correção
- O usuário corrige os dados e tenta novamente

FE2 - Erro ao envia notificação

- O sistema informa que ocorreu um erro inesperado ao enviar a notificação e permite que o usuário tente novamente

Pós-condição:

- Uma notificação é enviada a todos os membros da família

---

---