set :application, "sonata"
set :domain,      "#{application}.titomiguelcosta.com"
set :deploy_to,   "/home/ubuntu/websites/sonata"
set :app_path,    "app"

set :repository,  "https://github.com/titomiguelcosta/SonataAdminTheme.git"
set :scm,         :git

set :model_manager, "doctrine"

role :web, domain
role :app, domain, :primary => true

set :keep_releases, 3

# Be more verbose by uncommenting the following line
# logger.level = Logger::MAX_LEVEL

set :symfony_env_prod, "prod"
set :interactive_mode, false

set :user, "ubuntu"
set :use_sudo, false

set :shared_files, ["app/config/parameters.yml"]
set :shared_children, [app_path + "/logs", web_path + "/uploads", "vendor"]

set :use_composer, true
set :composer_options,  "--no-dev --verbose --prefer-dist --optimize-autoloader --no-progress --no-interaction"
set :update_vendors, true
set :vendors_mode, "install"
set :copy_vendors, true

after "deploy", "deploy:cleanup"
after "deploy:create_symlink", "symfony:doctrine:schema:update"
after "deploy:create_symlink" do
    run "#{try_sudo} sh -c 'cd #{latest_release} && #{php_bin} #{symfony_console} doctrine:fixtures:load #{console_options}'"
end