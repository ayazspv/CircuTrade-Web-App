# CircuTrade Web App

## Features

### Frontend
- User authentication (login & register) with JWT
- Materials listing and details (fetched from backend API)
- Orders overview and management (for managers)
- User management (for admins/managers)
- Dashboard with statistics (items, orders, users)
- Responsive design with Vue 3 and Pinia state management
- Error and loading state handling
- Ordering materials and checking its status

### Backend
- RESTful API built with PHP
- JWT authentication for protected routes
- User registration and login with password hashing
- CRUD operations for materials, orders, users, and order items
- Database connection via PDO (MariaDB/MySQL)
- CORS enabled for frontend-backend communication
- Routing with Bramus Router

## User Credentials (for testing)

| Name    | Email               | Password    | Role   |
|---------|---------------------|-------------|--------|
| Alice   | alice@example.com   | secret123   | admin  |
| Bob     | bob@example.com     | secret123   | user   |
| Charlie | charlie@example.com | secret123   | user   |

> **Note:** If you register a new user via the frontend, use the same email and password for login.

## Database Credentials

- **Host:** db (or localhost if running locally)
- **Database:** CircuTrade
- **User:** dbmanager
- **Password:** dbpassword
- **Root User:** root
- **Root Password:** rootpass

## Getting Started

### Running the application

To start the whole application you can use docker:

```sh
docker-compose up --build
```

### In case of docker error

incase of docker error with running the frontend and the backend, you can run the backend and frontend separatly. for frotend use the command below:

```sh
npm install
npm run dev
```
Also to be able to access the api's you should change the axios.js file, and in the url, put http://localhost at the beginning of it

### Building the Frontend for Production

To build the frontend for production:

```sh
npm run build
```

## Known Issues

- Ensure that the backend is running and accessible at the correct base URL (`http://localhost/api/`).
- Double-check CORS and Docker/Nginx configuration if you encounter connection problems.

---

For further troubleshooting, check the browser console and backend logs for error messages.