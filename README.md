# Address Book

Address Book is a simple and easy-to-use contact management web application. With its clean and user-friendly interface, you can manage your contacts and their addresses effortlessly. Address Book is built with PHP, MySQL, HTML, CSS, and JavaScript. It also supports Progressive Web App (PWA) features, allowing users to add it to their home screen for quick access.

## Features

- **Manage Contacts**: Add, edit, and delete contacts with their addresses.
- **User Authentication**: Sign up or log in to manage your personal address book.
- **Responsive UI**: The interface is optimized for all screen sizes.
- **PWA Support**: Users can install the Address Book app on their devices using "Add to Home Screen."

## Project Structure

```plaintext
app/
├── auth/
│   ├── login.php
│   └── signup.php
├── contact/
│   ├── index.php
│   ├── server.php
│   └── style.css
assets/
├── icons/
│   ├── android/
│   ├── ios/
│   ├── windows11/
│   ├── add-user.svg
│   ├── back.svg
│   ├── delete-user.svg
│   ├── edit-user.svg
│   ├── logo.svg
│   └── logout.svg
sql/
├── init.sql
manifest.json
docker-compose.yml
```

## Getting Started

### Prerequisites

- PHP (>=7.0)
- MySQL
- Web Browser that supports PWA (for "Add to Home Screen" feature)

### Installation

1. **Clone the repository**:

   ```bash
   git clone https://github.com/your-repo/address-book.git
   cd address-book
   ```

2. **Set up the database**:

   - Use the `init.sql` file to set up the MySQL database. You can import this file via PHPMyAdmin or using the MySQL command line.

   ```bash
   mysql -u your_user -p your_password < sql/init.sql
   ```

3. **Run the Application**:

   - If using Docker, use the provided `docker-compose.yml` file to spin up the environment.

   ```bash
   docker-compose up
   ```

4. **Access the Application**:
   - Open the app in your browser at `http://localhost` or wherever your server is hosted.

### Progressive Web App (PWA)

- **Add to Home Screen**: Address Book supports PWA features. Users can add the app to their device's home screen by clicking the "Add to Home Screen" option in their browser.

## Usage

1. **Sign Up / Log In**:

   - New users can sign up, while existing users can log in to access their personal address book.

2. **Manage Contacts**:
   - On the home page, you can view a table of all your contacts.
   - Use the blue button to edit a contact and the red button to delete a contact.
   - To create a new contact, click on the "Add Contact" button, and fill out the form with details like Name, Phone Number, Email, and Address.

## Contributing

We welcome contributions! To contribute:

1. **Open an Issue**: If you find a bug or want to request a feature, open an issue.
2. **Work on the Issue**: Once the issue is assigned to you, work on resolving it.
3. **Create a Pull Request**: After resolving the issue, submit a pull request for review.

## License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for more details.
