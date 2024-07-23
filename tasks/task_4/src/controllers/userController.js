const UserService = require('../services/userService');

class UserController {
    static async getUsers(req, res) {
        try {
            const users = await UserService.getUsers();
            const html = UserService.generateHtml(users);
            res.send(html);
        } catch (err) {
            console.error(err);
            res.status(500).send('Error processing request');
        }
    }
}

module.exports = UserController;