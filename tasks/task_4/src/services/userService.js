const fs = require('fs');
const path = require('path');
const usersFilePath = path.join(__dirname, '../data/users.json');

class UserService {
    static async getUsers() {
        try {
            const data = await fs.promises.readFile(usersFilePath, 'utf8');
            return JSON.parse(data);
        } catch (err) {
            throw new Error('Errors read the data');
        }
    }

    static generateHtml(users) {
        let html = '<h1>Users List</h1><ul>';
        users.forEach(user => {
            html += `<li>${user.name}</li>`;
        });
        html += '</ul>';
        return html;
    }
}

module.exports = UserService;