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

| Responsável                                                               | Sistema                                                  |
|---------------------------------------------------------------------------|----------------------------------------------------------|
| Solicita a adição de um novo membro na família                            | Pergunta se o novo membro é maior idade                  |
| Informa que é que maior de idade                                          | Disponibiliza um código de acesso com validade de 1 hora |
| Envia o código de acesso ao novo membro para que ele participe da família |                                                          |

Fluxos Alternativos:

FA1 - O novo membro é um menor de idade

- O sistema redireciona o usuário para a adição de um menor de idade na família e inicia o CSU x

Fluxo de Exceção:

FE1 - Erro ao gerar o código de acesso

- O sistema informa que ocorreu um erro inesperado e permite que o usuário tente novamente

FE2 - 

Pós-condição:

---

---

### CSU4 - Criar lista de compras

Resumo:

- Um membro da família cria uma nova lista de compras.

Ator Principal:

Pré-condições:

Fluxo Principal:

Fluxos Alternativos:

Fluxo de Exceção:

Pós-condição:

---

---

### CSU5 - Adicionar item na lista de compras

Resumo:

- Um membro da família adiciona um novo item em uma lista de compras.

Ator Principal:

Pré-condições:

Fluxo Principal:

Fluxos Alternativos:

Fluxo de Exceção:

Pós-condição:

---

---

### CSU6 - Alterar item na lista de compras

Resumo:

- Um membro da família altera os dados de item de uma lista de compras.

Ator Principal:

Pré-condições:

Fluxo Principal:

Fluxos Alternativos:

Fluxo de Exceção:

Pós-condição:

---

---

### CSU7 - Remover item da lista de compras

Resumo:

- Um membro da família remove um item da lista de compras

Ator Principal:

Pré-condições:

Fluxo Principal:

Fluxos Alternativos:

Fluxo de Exceção:

Pós-condição:

---

---

### CSU8 - Alterar lista de compras

Resumo:

- Um membro altera uma lista de compras, modificando coisas como itens, descrição, visibilidade, etc.

Ator Principal:

Pré-condições:

Fluxo Principal:

Fluxos Alternativos:

Fluxo de Exceção:

Pós-condição:

---

---

### CSU9 - Consultar lista de compras

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

### CSU 10 - Deletar lista de compras

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

### CSU11 - Alterar visibilidade da lista de compras

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

### CSU12 - Definir responsáveis de uma lista de compras

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

### CSU13 - Definir permissões de acesso

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

### CSU 14 - Enviar notificação

Resumo: 

- Um membro da família envia uma notificação, contendo uma mensagem personalizada, ao outros membros.

Ator Principal:

Pré-condições:

Fluxo Principal:

Fluxos Alternativos:

Fluxo de Exceção:

Pós-condição:

---