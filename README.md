# CCS Help Desk with Chat Bot

Welcome to the CCS Help Desk project, a web-based application designed to streamline support services with an integrated chat bot feature.

## Features

- **Ticket Management**: Efficiently track and manage user support requests.
- **Integrated Chat Bot**: Provide instant assistance to users through an AI-powered chat interface.
- **User Authentication**: Secure login and registration system for users and administrators.
- **Responsive Design**: Accessible on various devices, ensuring a seamless user experience.

## Prerequisites

Before setting up the project, ensure you have the following installed:

- [Docker](https://docs.docker.com/get-docker/)
- [Composer](https://getcomposer.org/download/)
- [Node.js and npm](https://nodejs.org/)

## Installation

Follow these steps to set up the project on your local machine:

1. **Clone the Repository**:

   ```bash
   git clone https://github.com/jakepanlilio2000/CCS-HELP-DESK.git
   cd CCS-HELP-DESK
   ```

2. **Set Up Environment Variables**:

   Copy the example environment file and adjust settings as needed:

   ```bash
   cp .env.example .env
   ```

   Update the `.env` file with your specific environment settings, such as database connection details.

3. **Install Composer Dependencies**:

   ```bash
   composer install
   ```

4. **Install Laravel Sail** (if not already installed):

   ```bash
   composer require laravel/sail --dev
   ```

5. **Run Sail Installation Command**:

   ```bash
   php artisan sail:install
   ```

6. **Start Sail**:

   ```bash
   ./vendor/bin/sail up
   ```

7. **Install Node.js Dependencies**:

   ```bash
   npm install
   ```

8. **Update Node.js Dependencies**:

   ```bash
   npm update
   ```

9. **Build Frontend Assets**:

   ```bash
   npm run build
   ```

10. **Run Migrations**:

    ```bash
    ./vendor/bin/sail artisan migrate
    ```

## Usage

With the environment up and running, you can access the application at `http://localhost` (or the appropriate URL provided by Sail). Use the application to manage support tickets and interact with the integrated chat bot.

## Contributing

We welcome contributions to enhance the CCS Help Desk project. To contribute:

1. Fork the repository.
2. Create a new branch for your feature or bug fix.
3. Commit your changes with clear messages.
4. Push your branch and open a Pull Request.

Please ensure your code adheres to the project's coding standards and includes relevant tests.

## License

This project is licensed under the [MIT License](https://mit-license.org/). The MIT License is a permissive free software license originating at the Massachusetts Institute of Technology. It allows for reuse within proprietary software, provided that all copies of the software include a copy of the terms of the MIT License and a copyright notice. citeturn0search0

---

For any questions or support, please open an issue in this repository. 
