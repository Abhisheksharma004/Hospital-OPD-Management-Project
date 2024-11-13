# 🏥 Hospital OPD Management Project

The **Hospital OPD Management Project** is a comprehensive, web-based application designed to streamline the outpatient department (OPD) operations of hospitals. Built with a strong focus on user experience and automation, this project handles critical aspects like patient registration, staff management, and emergency services efficiently.

## 📋 Project Overview
- The main goal of the project is to reduce manual tasks in hospital OPD operations by automating processes.
- The system includes features for **patient management**, **doctor and staff management**, and **emergency services**.
- It is implemented using **PHP** for backend logic, **MySQL** for database management, and **HTML/CSS/JavaScript** for the frontend interface.

## 🛠️ Tech Stack
- **Frontend**:
  - **HTML5**: Provides the basic structure of the web pages.
  - **CSS3**: Used for styling, with responsive design techniques for mobile-friendly views.
  - **JavaScript**: Adds interactivity to the user interface.
- **Backend**:
  - **PHP**: Handles server-side scripting and business logic.
- **Database**:
  - **MySQL**: Stores patient records, staff details, and other hospital data securely.

## 🚀 Key Features

### 1. Admin Dashboard
- A centralized control panel for the administrator, displaying key statistics and providing access to all management features.
- Includes navigation to different modules like **patient records**, **doctor details**, and **emergency services**.

### 2. User Authentication System
- **Login and Registration**:
  - Users (admin and staff) can log in securely with unique credentials.
  - Password protection and session management ensure data security.
- **Role-based Access**:
  - Admin users have access to all features.
  - Staff users have restricted access based on their assigned roles.

### 3. Patient Management Module
- **Add OPD Patient**:
  - A form-based interface to add new outpatient records with personal and medical details.
- **Update Patient Information**:
  - Allows editing and updating patient records as needed.
- **Discharge Summary**:
  - Generates a printable discharge summary report containing patient details, treatment information, and follow-up recommendations.

### 4. Doctor and Staff Management
- **View and Add Doctors**:
  - Interface for adding new doctors and updating their specialization details.
  - Displays a list of all doctors with relevant information.
- **Staff Management**:
  - Enables the admin to add, update, and view hospital staff details.

### 5. Emergency Services Module
- Provides a separate workflow for registering **emergency (EMG)** patients, allowing for quick and efficient handling of urgent cases.
- Streamlines patient flow by differentiating between regular OPD patients and emergency entries.

### 6. Barcode Integration
- Uses a custom `barcode.ttf` font file to generate barcodes for patient documents.
- Barcodes can be printed on patient files, aiding in efficient identification and tracking.

## 📂 Repository Structure
- **Main Files**:
  - `index.php`: Home page of the application.
  - `adminlog.php`: Handles admin login functionality.
  - `addOPD.php`: Adds new OPD patient entries.
  - `viewDoctor.php`: Displays a list of all doctors and their details.
  - `db_con.php`: Manages the database connection setup.
- **Assets Folder**:
  - Contains CSS stylesheets for consistent design.
  - `images/`: Stores static images used in the application interface.
- **Database Configuration**:
  - MySQL tables for patients, doctors, users, and other essential data are defined in the `db_con.php` file.

## 📝 How to Set Up the Project
1. **Clone the Repository**:
   ```bash
   git clone https://github.com/Abhisheksharma004/Hospital-OPD-Management-Project.git
