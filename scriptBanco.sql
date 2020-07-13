-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           8.0.17 - MySQL Community Server - GPL
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              10.3.0.5771
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Copiando estrutura do banco de dados para locacao_imoveis
CREATE DATABASE IF NOT EXISTS `locacao_imoveis` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `locacao_imoveis`;

-- Copiando estrutura para tabela locacao_imoveis.enderecos_imoveis
CREATE TABLE IF NOT EXISTS `enderecos_imoveis` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `descricao` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cep` char(9) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numero` int(11) NOT NULL,
  `logradouro` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `complemento` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `bairro` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `localidade` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uf` char(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `locacao` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `numero` (`numero`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela locacao_imoveis.enderecos_imoveis: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `enderecos_imoveis` DISABLE KEYS */;
INSERT INTO `enderecos_imoveis` (`id`, `descricao`, `cep`, `numero`, `logradouro`, `complemento`, `bairro`, `localidade`, `uf`, `locacao`) VALUES
	(1, 'Apresentamos o Residencial Varandas da Pampulha!! Apartamentos prontos para morar no bairro Santa Amélia. Apartamentos de 3 quartos com área privativa, suíte, varanda gourmet, ótima localização. Condomínio com espaço fitness, playground e salão de festas.\r\nPróximo a vários locais como: Aeroporto Pampulha; Lagoa da Pampulha; Mineirão, mercado, todos os bancos, zoológico, farmácia, creche infantil, Escola infantil (UMEI).', '31550-320', 100, 'Rua Pelicano Frade', '', 'Santa Amélia', 'Belo Horizonte', 'MG', 0),
	(2, 'Apartamento com 47m² e 1 quarto\r\nNa Lockey você aluga sem precisar de um fiador, porque a gente paga o seguro fiança pra você! ;) - O processo é 100% digital, do agendamento da visita à assinatura do contrato! Sem idas à imobiliária e sem custo com cartórios.', '90620-170', 300, 'Rua São Luís', '', 'Santana', 'Porto Alegre', 'RS', 1),
	(3, 'Sala comercial na Sc 401\r\nExcelente Oportunidade!\r\nEntre em contato e agende já uma visita com um de nossos corretores. Os preços, valores e caraterísticas exibidos poderão sofrer mudanças sem aviso prévio, por este motivo todas as informações deverão ser confirmadas pelo departamento comercial. Para otimizar o seu atendimento tenha em mãos o número da referência do imóvel (código). Entre em contato preenchendo o formulário e informe sempre um telefone para receber todas as informações.', '88032-001', 250, 'Rodovia Virgílio Várzea', '', 'Saco Grande', 'Florianópolis', 'SC', 1),
	(4, 'Apartamento com 2 dormitórios para alugar, 47 m² por R$ 1.516/mês - Lindóia - Curitiba/PR\r\nExcelente Oportunidade!\r\nEntre em contato e agende já uma visita com um de nossos corretores. Os preços, valores e caraterísticas exibidos poderão sofrer mudanças sem aviso prévio, por este motivo todas as informações deverão ser confirmadas pelo departamento comercial. Para otimizar o seu atendimento tenha em mãos o número da referência do imóvel (código). Entre em contato preenchendo o formulário e informe sempre um telefone para receber todas as informações.', '81010-234', 121, 'Travessa Arthur Romarli Monteiro', '', 'Lindóia', 'Curitiba', 'PR', 0),
	(5, 'Sala para alugar no bairro Boa Viagem, 30m²\r\nGaleria Santo Antônio\r\nFB282 - Sala com 30m², wc, copa, depósito, cerâmica, uma vaga rotativa. Ótima localização!\r\nR$1.250,00 com todas as taxas.', '51020-904', 400, 'Avenida Fernando Simões Barbosa 22', '', 'Boa Viagem', 'Recife', 'PE', 0);
/*!40000 ALTER TABLE `enderecos_imoveis` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
