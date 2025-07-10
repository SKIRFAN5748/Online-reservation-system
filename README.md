
# 🧾 Online Reservation System

A web-based platform for booking **flight** and **train tickets** with admin control and secure login system. This project was developed as part of a **Diploma in Computer Science & Technology (2019–2022)** under the guidance of **Mr. Arjak Majumdar** and **Mr. Kailash Pati Mandal**.

---

## 📌 Project Overview

The **Online Reservation System (ORS)** aims to simplify the ticket reservation process by digitizing manual operations. It supports:
- Viewing availability
- User registration
- Booking tickets
- Admin dashboard for managing schedules, flights, and trains


Project Link : https://ors.skirfan.com/

portfolio website - https://skirfan.com/
---

## 👨‍💻 Developed By

- Rohit Kumar Dutta  
- Sk Irfan  
- Nikita Gorai  
- Beauty Mahato  
- Subhadeep Sengupta  
- Ritish Roy  

---

## 🛠️ Tech Stack

- **Frontend:** HTML, CSS, JavaScript  
- **Backend:** PHP  
- **Database:** MySQL  
- **Server:** XAMPP (Apache, MySQL)  

---

## 📋 Features

### 👥 User Side
- Register and login
- Search flights and trains
- Book and cancel tickets
- View booking history
- Online payment and feedback

### 🛠️ Admin Side
- Secure admin login
- Add/Edit/Delete: Flights, Trains, Schedules, Jet Info
- Manage users and bookings
- Activate/Deactivate aircraft

---

## 📁 Database Tables

- `admin`: stores admin login credentials  
- `flight_details`: flight data and seat info  
- `train`: train data  
- `jet_details`: aircraft configuration  
- `ticket_details`: booking data for flights  
- `tbooked`, `tpayment`: transaction-related tables  

---

## 🔐 Security Measures

- Authentication checks for both user and admin roles  
- No page access without login (URL restriction)  
- Admin actions protected via session validation  
- Password-based access for admins  
- XAMPP security settings enforced  

---

## 🔍 Testing Strategy

- **Unit Testing** for login, ticket booking  
- **White Box Testing** for functions and logic  
- **Black Box Testing** for UI behavior and boundary input  
- **System Testing** to validate full functionality  
- **Bug Reporting** & retesting loop

---

## 🔮 Future Enhancements

- Add Bus, Cab, and Ship booking modules  
- Enable online cancellation with refund tracking  
- Add mobile responsiveness  
- Real-time seat availability updates  

---

## 🚀 How to Run Locally

1. Install [XAMPP](https://www.apachefriends.org/)
2. Place the project folder inside `/htdocs`
3. Import the MySQL DB (`fyp.sql`) via phpMyAdmin
4. Start Apache & MySQL from XAMPP
5. Access the site via: `http://localhost/<project-folder>/`

---

## 📚 References

- [PHP & MySQL Web Development](https://www.pearson.com)
- [W3Schools](https://www.w3schools.com)
- [Stack Overflow](https://stackoverflow.com)
- [TutorialsPoint](https://www.tutorialspoint.com)

---

### 🎓 Developed at  
**Asansol Institute of Engineering and Management - Polytechnic**  
**Affiliated to WBSCT&VE&SD**

---

### 🔗 License
This project is for educational purposes only. Free to use, modify, and enhance.
