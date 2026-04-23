# Requisitos Mínimos do Servidor - Tema JR26

## Versão
Tema JR26 v1.0.0

## Data
10/03/2026

## Requisitos de Software

### PHP
- **Versão mínima:** PHP 7.0
- **Versão recomendada:** PHP 8.0 ou superior
- **Motivo:** O tema utiliza type declarations e strict types (`declare(strict_types=1)`)

### Extensões PHP Obrigatórias
- `mysqli` ou `pdo_mysql` - Conexão à base de dados
- `json` - Manipulação de dados JSON
- `mbstring` - Manipulação de strings multibyte
- `curl` - Requisições HTTP
- `zip` - Compressão de ficheiros
- `gd` ou `imagick` - Processamento de imagens
- `xml` - Processamento XML
- `openssl` - Segurança e encriptação

### WordPress
- **Versão mínima:** WordPress 5.0
- **Versão recomendada:** WordPress 6.0 ou superior

### Base de Dados
- **MySQL 5.7+** ou
- **MariaDB 10.3+**

### Servidor Web
Suporta qualquer um dos seguintes:
- **Apache 2.4+** com módulo `mod_rewrite` ativado

## Plugins Obrigatórios

### Advanced Custom Fields (ACF)
- O tema tem dependência do plugin ACF para campos personalizados
- Versão mínima recomendada: ACF 5.8+

## Requisitos de Hardware

### Recursos Mínimos
- **Memória RAM mímino:** 512 MB
- **Memória RAM Recomendada:** 1 GB ou superior
- **Espaço em disco:** 500 MB (WordPress + tema + uploads)
- **CPU Mínimo Recomendado:** 2+ cores

## Configurações PHP Recomendadas

Adicionar ao ficheiro `php.ini` ou `.htaccess`:

```ini
memory_limit = 256M
upload_max_filesize = 256M
post_max_size = 256M
max_execution_time = 300
max_input_vars = 3000
max_input_time = 300
```

## Configurações do Servidor Web

### Apache
Certifique-se que o módulo `mod_rewrite` está ativo:
```bash
a2enmod rewrite
```

Configuração necessária no `.htaccess` ou VirtualHost:
```apache
<IfModule mod_rewrite.c>
    RewriteEngine On
    RewriteBase /
    RewriteRule ^index\.php$ - [L]
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteRule . /index.php [L]
</IfModule>
```

## Requisitos de Segurança

### SSL/TLS
- **HTTPS - Certificado SSL válido** para ambiente de produção

**Segurança:** Não inclui node_modules ou ferramentas de build no servidor de produção

### Permissões de Ficheiros
```bash
# Diretórios
find . -type d -exec chmod 755 {} \;

# Ficheiros
find . -type f -exec chmod 644 {} \;

# wp-config.php
chmod 600 wp-config.php
```

### Configurações de Segurança no wp-config.php
```php
define('DISALLOW_FILE_EDIT', true);
define('FORCE_SSL_ADMIN', true);
```

## Dependências Externas
Sem dependências externas

## Estrutura de Ficheiros Necessária

O tema inclui os seguintes ficheiros compilados (não requer compilação):
```
/assets/
    /css/
        main.css (ficheiro CSS compilado)
    /js/
        main.js (ficheiro JavaScript)
    /quizes/
        Default-Questionnaire-questionnaire.json
```

## Checklist de Deployment

- [ ] PHP 7.0+ instalado com todas as extensões necessárias
- [ ] MySQL/MariaDB configurado
- [ ] WordPress instalado e configurado
- [ ] Plugin ACF instalado e ativo
- [ ] Mod_rewrite ativo (Apache) ou configuração equivalente (Nginx)
- [ ] Permalinks configurados
- [ ] SSL/HTTPS configurado
- [ ] Permissões de ficheiros correctas
- [ ] wp-config.php com configurações de segurança
- [ ] Backup configurado

