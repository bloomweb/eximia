# INITIAL CONFIGURATION
default_run_options[:pty] = true # Para pedir la contraseña de la llave publica de github via consola, sino sale error de llave publica.
set :application, "eximia.bloomweb.co"
#set :export, :remote_cache
set :keep_releases, 5
#set :cakephp_app_path, "app"
#set :cakephp_core_path, "cake"

# DEPLOYMENT DIRECTORY STRUCTURE
set :deploy_to, "/home/embalao/eximia.bloomweb.co"

# USER & PASSWORD
set :user, 'embalao'
set :password, 'Luci@na2012'

# ROLES
role :app, "eximia.bloomweb.co"
role :web, "eximia.bloomweb.co"
role :db, "eximia.bloomweb.co", :primary => true

# VERSION TRACKER INFORMATION
set :scm, :git
set :use_sudo, false
set :repository,  "git@github.com:bloomweb/eximia.git"
set :branch, "master"

# TASKS
namespace :deploy do
  
  task :start do ; end
  
  task :stop do ; end
  
  task :restart, :roles => :app, :except => { :no_release => true } do
    run "cp /home/embalao/eximia.bloomweb.co/current/source/. /home/embalao/eximia.bloomweb.co/ -R"
    run "chmod 777 /home/embalao/eximia.bloomweb.co/sites/default/files -R"
    run "chmod 644 /home/embalao/eximia.bloomweb.co/sites/default/files/.htaccess"
  end
  
end