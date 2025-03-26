# Authentication Tech Challenge 🔑

Welcome to the **Authenticatoin Tech Challenge** for AkSub **RnD**! This project demonstrates the use of **Laravel 12** and **Passport** for implementing authentication in an API. The goal is to showcase secure authentication with **OAuth2** using Passport, allowing users to register, log in, and manage their sessions.

<br>

## 🛠️ Features

- **User Registration**: Users can register by providing their credentials.
- **User Login**: Secure login with OAuth2 using Laravel Passport.
- **Token Authentication**: Once logged in, users receive an access token to authenticate API requests.
- **API Authentication**: Authenticate and access protected routes using the generated token.

## 💻 Technologies Used

- **Backend**: Laravel 12
- **Authentication**: Laravel Passport (OAuth2)
- **Database**: MySQL

## 🎯 How to Use

- Start the Laravel server on your local machine.

- Open `http://localhost:8000` in your browser.

- Use the authentication routes to register, log in, and get your access token.

- Use the access token to make authenticated API requests.

## 🔧 Installation

Follow these steps to set up the project on your local machine:

1. Clone the repository:
   ```bash
   git clone https://github.com/Kezota/Kezia_TechChallenge_Authentication_02.git
   ```
2. Navigate to the project directory:
   ```bash
   cd Kezia_TechChallenge_Authentication_02
   ```
3. Install the necessary dependencies:
   ```bash
   composer install
   ```
4. Set up your `.env` file by copying `.env.example` to `.env`:
   ```bash
   cp .env.example .env
   ```
5. Generate the application key:
   ```bash
   php artisan key:generate
   ```
6. Run the migrations to create the necessary tables:
   ```bash
   php artisan migrate
   ```
7. If you haven't already, configure Passport in the `.env` file:
   ```bash
   PASSPORT_CLIENT_ID=your_client_id
   PASSPORT_CLIENT_SECRET=your_client_secret
   ```
8. Start the Laravel server:
   ```bash
   php artisan serve
   ```
9. Visit `http://localhost:8000` to test user registration and login via the API.

## 📚 API Endpoints

1. **User Login**  
   URL: `/api/login`  
   Method: `POST`  
   Request Body:
   ```json
   {
     "email": "johndoe@example.com",
     "password": "password123"
   }
   ```
1. **User Registration**  
   URL: `/api/register`  
   Method: `POST`  
   Request Body:
   ```json
   {
     "name": "John Doe",
     "email": "johndoe@example.com",
     "password": "password123"
    }
   ```
3. **User Logout**  
   URL: `/api/logout`  
   Method: `POST`  
   Headers:
   Authorization: Bearer {access_token}
   Request Body: (None)

## 👏 Credits

This project was built as part of a tech challenge.

## 🤝 Contributing

If you'd like to contribute to the development of this project, feel free to fork the repository and submit a pull request. Contributions are always welcome!
