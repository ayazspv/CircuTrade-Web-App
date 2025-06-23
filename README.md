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

### Backend
- RESTful API built with PHP
- JWT authentication for protected routes
- User registration and login with password hashing
- CRUD operations for materials, orders, users, and order items
- Database connection via PDO (MariaDB/MySQL)
- CORS enabled for frontend-backend communication
- Routing with Bramus Router

## User Credentials (for testing)

| Name    | Email               | Password         | Role   |
|---------|---------------------|------------------|--------|
| Alice   | alice@example.com   | SecretPassword   | admin  |
| Bob     | bob@example.com     | SecretPassword   | user   |
| Charlie | charlie@example.com | SecretPassword   | user   |

> **Note:** If you register a new user via the frontend, use the same email and password for login.

## Database Credentials

- **Host:** db (or localhost if running locally)
- **Database:** CircuTrade
- **User:** dbmanager
- **Password:** dbpassword
- **Root User:** root
- **Root Password:** rootpass

## Getting Started

### Running the Backend

To start the backend API, use Docker Compose:

```sh
docker-compose up --build
```

### Running the Frontend

To run the frontend development server:

```sh
npm install
npm run dev
```

### Building the Frontend for Production

To build the frontend for production:

```sh
npm run build
```

## Known Issues

- There are issues with Axios and fetching the correct data from the backend API.
- Routing between the frontend and backend is not working as expected; some API calls may not return data or may fail due to misconfiguration.
- Ensure that the backend is running and accessible at the correct base URL (`http://localhost/api/`).
- Double-check CORS and Docker/Nginx configuration if you encounter connection problems.

---

For further troubleshooting, check the browser console and backend logs for error messages.