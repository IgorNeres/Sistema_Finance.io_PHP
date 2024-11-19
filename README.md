# Finance.io
<div style="alight-center;">
  <img src="https://github.com/user-attachments/assets/bc1298ec-3894-4e02-aad9-8ed01720dcae" width="200px">
</div>

Este sistema foi desenvolvido para gerenciar clientes, fiados e produtos de uma empresa. O sistema permite um login único para acesso, onde o usuário tem acesso a três áreas principais: **Clientes**, **Fiados** e **Produtos**.

## Funcionalidades

### 1. **Login**
- O sistema possui um login simples, onde o usuário deve fornecer **usuário** e **senha**.
- Há apenas **um usuário** no sistema, com login único, o que garante que apenas a pessoa com as credenciais corretas possa acessar a plataforma.

### 2. **Menu Principal**
Após o login, o sistema apresenta um menu com três opções:
- **Clientes**: Gerenciar informações dos clientes cadastrados.
- **Fiados**: Controlar as dívidas dos clientes.
- **Produtos**: Gerenciar o estoque de produtos e calcular os preços sugeridos.

---

## **1. Clientes**

Na seção de **Clientes**, o usuário pode realizar as seguintes operações:

### Funcionalidades:
- **Cadastrar Cliente**: Adicionar um novo cliente com os seguintes dados:
  - Nome
  - Telefone
  - Endereço
- **Visualizar Clientes**: Exibir todos os clientes cadastrados, com a possibilidade de realizar:
  - **Editar**: Atualizar informações do cliente (nome, telefone, endereço).
  - **Excluir**: Apagar um cliente da base de dados.

---

## **2. Fiados**

Na seção de **Fiados**, o usuário pode controlar as dívidas de clientes cadastrados:

### Funcionalidades:
- **Adicionar Fiado**: Registrar uma nova dívida para um cliente com os seguintes dados:
  - Data da dívida
  - Apelido (para identificar o tipo de fiado ou descrição)
  - Valor da dívida
  
- **Visualizar Dívidas**: Exibir todas as dívidas de um cliente, com a possibilidade de realizar:
  - **Apagar Dívida Única**: Excluir uma dívida específica.
  - **Apagar Toda Dívida**: Excluir todas as dívidas de um cliente (se necessário).

---

## **3. Produtos**

Na seção de **Produtos**, o usuário pode gerenciar o estoque da empresa:

### Funcionalidades:
- **Cadastrar Produto**: Adicionar um novo produto com as seguintes informações:
  - Nome do produto
  - Código do produto
  - Quantidade de unidades por caixa (qtd_caixa)
  - Preço por caixa (preco_caixa)
  
- **Visualizar Produtos**: Exibir todos os produtos cadastrados, com a possibilidade de realizar:
  - **Editar**: Atualizar informações do produto (nome, código, quantidade de caixas, preço da caixa e preço sugerido).
  - **Excluir**: Apagar um produto do banco de dados.

- **Cálculo de Preço Sugerido**: O sistema calcula automaticamente o preço sugerido para venda, baseado na quantidade de unidades por caixa e no preço da caixa. A fórmula utilizada é:
  
  ```
  Preço sugerido = (Preço da caixa / Quantidade de unidades por caixa) * 1.3
  ```

  Isso adiciona 30% ao valor de custo para gerar um preço sugerido de venda.

---

## Requisitos Técnicos

- **Tecnologias Utilizadas**:
  - **PHP**: Linguagem de programação para o backend.
  - **MySQL**: Banco de dados utilizado para armazenar as informações dos clientes, fiados e produtos.
  - **Bootstrap**: Framework CSS utilizado para o design responsivo e interação com o usuário.
  - **Ícones Bootstrap**: Para facilitar a navegação e visualização das ações no sistema.

- **Estrutura de Banco de Dados**:
 - **clientes**:
    - `id_user` (INT, PRIMARY KEY)
    - `username` (VARCHAR)
    - `senha` (VARCHAR)
  
  - **clientes**:
    - `id_clie` (INT, PRIMARY KEY)
    - `nome_clie` (VARCHAR)
    - `telefone_clie` (VARCHAR)
    - `endereco_clie` (VARCHAR)
  
  - **fiados**:
    - `id_fiado` (INT, PRIMARY KEY)
    - `id_clie` (INT, FOREIGN KEY)
    - `data_fiado` (DATE)
    - `apelido_fiado` (VARCHAR)
    - `valor_fiado` (DECIMAL)

  - **produtos**:
    - `id_prod` (INT, PRIMARY KEY)
    - `nome_prod` (VARCHAR)
    - `cod_prod` (VARCHAR)
    - `qtd_caixa` (INT)
    - `preco_caixa` (DECIMAL)
    - `preco_sujerido` (DECIMAL)

    ### **Banco de Dados - Código SQL**
    
    CREATE TABLE `cliente` (
      `id_clie` int(11) NOT NULL,
      `nome_clie` varchar(50) NOT NULL,
      `telefone_clie` varchar(11) NOT NULL,
      `endereco_clie` varchar(100) NOT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
    
    INSERT INTO `cliente` (`id_clie`, `nome_clie`, `telefone_clie`, `endereco_clie`) VALUES
    (1, 'Igor Neres da Silva', '88993104769', 'Rua São Francisco - 185 - Campo Velho'),
    (2, 'Gustavo', '88999999999', 'Poranga'),
    (3, 'Poliane Portela', '88999999999', 'Ararenda'),
    (4, 'Sophia Campelo', '88999999999', 'Indeps'),
    (5, 'Luzinete Neres', '88999999999', 'Rua São Francisco - 185 - Campo Velho'),
    (6, 'Thauana Beatriz', '88993104769', 'Venancios');
    
    CREATE TABLE `compra` (
      `id_com` int(11) NOT NULL,
      `fk_id_clie` int(11) NOT NULL,
      `data_com` date NOT NULL,
      `apelido_com` varchar(50) NOT NULL,
      `valor_com` float NOT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

    
    INSERT INTO `compra` (`id_com`, `fk_id_clie`, `data_com`, `apelido_com`, `valor_com`) VALUES
    (22, 1, '2024-11-18', 'Mercado', 100),
    (25, 4, '2024-11-02', 'Doce', 200),
    (29, 4, '2024-10-27', 'Balinha', 2);
    
    CREATE TABLE `produto` (
      `id_prod` int(11) NOT NULL,
      `cod_prod` varchar(13) NOT NULL,
      `nome_prod` varchar(100) NOT NULL,
      `qtd_caixa` int(11) NOT NULL,
      `preco_caixa` float NOT NULL,
      `preco_sujerido` float NOT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
    
    INSERT INTO `produto` (`id_prod`, `cod_prod`, `nome_prod`, `qtd_caixa`, `preco_caixa`, `preco_sujerido`) VALUES
    (3, '7891107101621', 'Shampoo', 15, 200, 17.3333),
    (4, '7896224807098', 'Biscoito', 24, 50, 2.70833),
    (5, '9452452472125', 'Condicionador', 12, 75, 8.125);
    
    
    CREATE TABLE `usuario` (
      `id_usuario` int(11) NOT NULL,
      `username` varchar(50) NOT NULL,
      `senha` varchar(20) NOT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
    
    
    INSERT INTO `usuario` (`id_usuario`, `username`, `senha`) VALUES
    (1, 'admin', 'admin');
    
    ALTER TABLE `cliente`
      ADD PRIMARY KEY (`id_clie`);
    
    ALTER TABLE `compra`
      ADD PRIMARY KEY (`id_com`),
      ADD KEY `fk_id_clie` (`fk_id_clie`);
    
    ALTER TABLE `produto`
      ADD PRIMARY KEY (`id_prod`),
      ADD UNIQUE KEY `cod_prod` (`cod_prod`);
    
    ALTER TABLE `usuario`
      ADD PRIMARY KEY (`id_usuario`);
    
    ALTER TABLE `cliente`
      MODIFY `id_clie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
    
    ALTER TABLE `compra`
      MODIFY `id_com` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
    
    ALTER TABLE `produto`
      MODIFY `id_prod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
    
    ALTER TABLE `usuario`
      MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
    
    ALTER TABLE `compra`
      ADD CONSTRAINT `fk_id_clie` FOREIGN KEY (`fk_id_clie`) REFERENCES `cliente` (`id_clie`);
    COMMIT;
    

## **Instruções de Uso**

1. **Login**: Insira seu nome de usuário e senha para acessar o sistema.
2. **Clientes**:
   - Cadastrar um cliente preenchendo o formulário com nome, telefone e endereço.
   - Gerenciar clientes já cadastrados, podendo editar ou excluir informações.
3. **Fiados**:
   - Adicionar uma dívida para um cliente específico.
   - Visualizar as dívidas e apagar dívidas individuais ou todas as dívidas de um cliente.
4. **Produtos**:
   - Cadastrar novos produtos no sistema, informando nome, código, quantidade de caixas e preço por caixa.
   - O preço sugerido será automaticamente calculado com base no valor da caixa.

---

## **Segurança**

- **Autenticação**: O login é baseado em um único usuário, garantindo o controle de acesso.
- **Validação de Dados**: O sistema possui validação de dados tanto no lado do cliente quanto no lado do servidor para garantir a integridade dos dados e prevenir entradas inválidas.

---

## **Fotos Sistema**
<div style="alight-center;">
  <img src="https://github.com/user-attachments/assets/90e00548-a49d-4cf8-9049-30c9d85a7fe0" width="300px">
  <img src="https://github.com/user-attachments/assets/25ac3be2-7ba3-4473-8f1d-27231f084641" width="300px">
  <img src="https://github.com/user-attachments/assets/4d503c85-4706-4021-ad61-10752fc0a37c" width="300px">
  <img src="https://github.com/user-attachments/assets/84bdb645-1b96-45a9-a1f1-620d9bc272a0" width="300px">
  <img src="https://github.com/user-attachments/assets/1348e650-7e54-4a01-b63f-72ef2dcb254f" width="300px">
  <img src="https://github.com/user-attachments/assets/bd43cd6e-7a9f-47f0-b0f0-c4697ff13f56" width="300px">
  <img src="https://github.com/user-attachments/assets/525b9284-f2ef-485b-b4f9-772a422c93cd" width="300px">
  <img src="https://github.com/user-attachments/assets/17bce254-a3f8-44dc-9aaa-412482d15815" width="300px">
  <img src="https://github.com/user-attachments/assets/32793da9-1021-4eaa-ac15-d979c433bf53" width="300px">
</div>
