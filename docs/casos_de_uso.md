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

- O usuário escolhe se deseja criar uma nova família ou participar de família existente

Ator Principal:

Pré-condições:

Fluxo Principal:

Fluxos Alternativos:

Fluxo de Exceção:

Pós-condição:

---

---

### CSU3 - Adicionar novo membro na família

Resumo:

- Um responsável da família adiciona um novo membro na família.

Ator Principal:

Pré-condições:

Fluxo Principal:

Fluxos Alternativos:

Fluxo de Exceção:

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