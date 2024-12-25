pipeline {
    agent any

    environment {
        // Replace with your Jenkins credential ID for SSH key
        GIT_CREDENTIALS_ID = 'f3d1e4c7-8b8f-44f0-bed1-942405f57038'
        // Rreplace with your GitHub repository URL
        REPO_URL = 'git@github.com:tiwiex/infinix_opigno.git'
    }

    stages {
        stage('Clone Repository') {
            steps {
                script {
                    // Checkout the Drupal repository from GitHub
                    checkout([
                        $class: 'GitSCM',
                        branches: [[name: '*/main']],
                        doGenerateSubmoduleConfigurations: false,
                        extensions: [],
                        submoduleCfg: [],
                        userRemoteConfigs: [[
                            url: env.REPO_URL,
                            credentialsId: env.GIT_CREDENTIALS_ID
                        ]]
                    ])
                }
            }
        }

        stage('Install Dependencies') {
            steps {
                script {
                    // Install dependencies using Composer
                    sh 'composer install'
                }
            }
        }

        stage('Run Tests') {
            steps {
                script {
                    // Replaced with your actual test commands
                    sh './vendor/bin/phpunit'
                }
            }
        }

        stage('Build Artifacts') {
            steps {
                script {
                    // Optional: Archive files if needed
                    sh 'tar -czf drupal-build.tar.gz .'
                }
            }
        }

        stage('Deploy to Server') {
            steps {
                script {
                    // Replace with deployment commands (e.g., rsync or SSH commands)
                    sh '''
                    ssh user@your-server "
                        cd /path/to/deploy &&
                        git pull origin main &&
                        composer install &&
                        drush updatedb &&
                        drush cache-rebuild
                    "
                    '''
                }
            }
        }
    }

    post {
        success {
            echo 'Pipeline completed successfully!'
        }
        failure {
            echo 'Pipeline failed. Check the logs for more details.'
        }
    }
}

