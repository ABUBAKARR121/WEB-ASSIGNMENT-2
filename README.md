# Football Agent System - CRUD Operations

A simple web application for managing football agent system users with full CRUD operations.

## Features

- Create new users by entering UserID
- Read/Search users by UserID
- Update user information
- Delete users
- Filter users by role
- Clean and simple interface

## Setup Instructions

### 1. Install XAMPP

Download and install XAMPP from https://www.apachefriends.org/

### 2. Start Services

Open XAMPP Control Panel and start:

- Apache
- MySQL

### 3. Place Files

Copy all files to: `C:\xampp\htdocs\football-agent\`

### 4. Setup Database

Open browser and visit: `http://localhost/football-agent/connect.php`

### 5. Create Tables

Visit: `http://localhost/football-agent/createtables.php`

### 6. Insert Sample Data (Optional)

Visit: `http://localhost/football-agent/multiplerecords.php`

### 7. Use the System

Visit: `http://localhost/football-agent/index.html`

## File Structure

- `index.html` - Main CRUD interface
- `connect.php` - Create database
- `dbconnect.php` - Database connection
- `createtables.php` - Create tables
- `multiplerecords.php` - Insert sample data
- `register.php` - Registration form
- `search_user.php` - Search user by ID
- `process_crud.php` - Create/Update operations
- `delete_user.php` - Delete user

## How to Use

### Create User:

1. Enter a new UserID in search box
2. Click "Search User"
3. System will prompt to create new user
4. Fill all fields and click "Create User"

### Read/Update User:

1. Enter existing UserID in search box
2. Click "Search User"
3. User details will load
4. Modify fields and click "Update User"

### Delete User:

1. Search for user
2. Click "Delete User" button
3. Confirm deletion

## User Roles

- Admin
- Agent
- Player
- Club Manager
- Scout

## Database Schema

Main table: `users`

- userID (Primary Key)
- userName
- userEmail
- userPassword
- userRole

## Notes

- All operations work by entering UserID only
- Simple and clean interface
- No JavaScript required
- Instant backend updates

## Troubleshooting

1. If database connection fails, check XAMPP services
2. If tables not created, check MySQL is running
3. If files not found, check directory path
