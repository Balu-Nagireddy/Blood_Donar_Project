# 🩸 **Blood Donor Finder App**  

## 📌 **Project Overview**  
The **Blood Donor Finder App** is a **Kotlin-based Android application** designed to connect **blood donors with recipients**. This app allows users to **register as donors, search for available blood donors nearby, and request blood donations** in case of emergencies.  

## 🏗 **Project Structure**  
```
Blood_Donor_Project/
├── app/                   # Main Android App Source  
│   ├── src/main/java/com/example/blooddonor/  
│   │   ├── activities/    # Activities (Login, Register, Search)  
│   │   ├── adapters/      # RecyclerView Adapters  
│   │   ├── models/        # Data Models (User, Request)  
│   │   ├── network/       # API & Retrofit Services  
│   │   ├── database/      # SQLite/MySQL Database Integration  
│   ├── res/layout/        # XML UI Layouts  
│   ├── res/drawable/      # Images & Icons  
├── api/                   # Backend API (PHP/Python/Node.js)  
├── database/              # MySQL Database & Queries  
├── README.md              # Project Documentation  
```

## 🚀 **Features**  
✅ **User Registration & Login**: Secure authentication with Firebase/MySQL  
✅ **Find Blood Donors**: Search by **blood group & location**  
✅ **Request Blood**: Send notifications to nearby donors  
✅ **Google Maps Integration**: Locate donors & hospitals easily  
✅ **Push Notifications**: Firebase Cloud Messaging for donation alerts  
✅ **Profile Management**: Update availability, contact details  

## 💻 **Tech Stack**  
- **Frontend**: Kotlin (Android Jetpack, Material UI)  
- **Backend**: PHP/Node.js (REST API)  
- **Database**: MySQL + Firebase  
- **Google APIs**: Google Maps & Location Services  
- **Tools**: Android Studio, Postman, Firebase Console  

## 🔥 **Getting Started**  
1️⃣ **Clone the Repository**  
```bash
git clone https://github.com/Balu-Nagireddy/Blood_Donar_Project.git
cd Blood_Donar_Project
```
2️⃣ **Set Up the Backend (API & Database)**  
- Configure the database (`blood_donor.sql`) in MySQL  
- Run the backend server (`XAMPP/WAMP` or `Node.js`)  

3️⃣ **Run the Android App**  
- Open in **Android Studio**  
- Sync Gradle and run the emulator  
- Test API endpoints with **Postman**  

## 📸 **Screenshots**  
![Home Screen](screenshots/home_screen.png)  
![Find Donors](screenshots/find_donors.png)  
![Request Blood](screenshots/request_blood.png)  

## 📌 **Future Enhancements**  
🔹 **AI-Based Matching**: Smart donor recommendations  
🔹 **Chat Integration**: Real-time chat between donors & recipients  
🔹 **Emergency SOS**: One-tap emergency alerts  

---
🤝 **Contributions Welcome!** Fork & submit PRs to improve the project.  
📧 **Need Help?** Open an issue or reach out!  

🚀 **Save Lives, Donate Blood!** 🩸
