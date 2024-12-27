# Task Management System

The Task Management System is a web-based application designed to help users efficiently manage their tasks. It includes features for creating, viewing, updating, and deleting tasks, as well as options for filtering and sorting tasks.

---

## Features

### CRUD Operations
- **Create**: Add new tasks with title, description, due date, and status.
- **Read**: View all tasks in a structured table format.
- **Update**: Edit task details such as title, description, due date, and status.
- **Delete**: Remove tasks from the list.

### Task Filtering and Sorting
- **Filter**: Filter tasks by status (Pending, In Progress, Completed).
- **Sort**: Sort tasks by due date (ascending or descending).

---

## Approach

The application was designed with simplicity and modularity in mind. Here’s a brief overview of the approach:

1. **Dynamic Task Management**:  
   All tasks are stored in a JavaScript array, enabling easy manipulation for CRUD operations. Each task includes properties such as `title`, `description`, `dueDate`, and `status`.

2. **Event-Driven Programming**:  
   - Form submissions trigger task addition.  
   - Buttons for editing and deleting tasks are bound to specific event handlers, ensuring that the DOM updates dynamically without requiring a full page reload.

3. **Filtering and Sorting**:  
   - Filters are applied in real-time by iterating over the task list and displaying only those that match the selected criteria.
   - Sorting by due date is implemented using the `Array.sort()` method, allowing ascending or descending order selection.

4. **Separation of Concerns**:  
   - HTML provides the structure for the form and table.  
   - CSS ensures a clean and responsive design.  
   - JavaScript handles all interactions and data manipulations.

5. **Scalable Design**:  
   - The codebase is structured to be extensible, making it easy to integrate additional features like persistent storage (e.g., `localStorage` or a backend API).

---

## Technology Stack

- **HTML5**: Structure and layout of the application.
- **CSS3**: Styling and design.
- **JavaScript (ES6)**: Functional logic for CRUD operations, filtering, and sorting.

---

## File Structure

```plaintext
.
├── index.html            # Main HTML file
├── styles.css            # Stylesheet for UI design
├── script.js             # JavaScript for functionality
├── README.md             # Project documentation
