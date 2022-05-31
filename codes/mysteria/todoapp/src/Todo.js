import { useState } from 'react'

import { logout } from './firebase';

function Todo() {
    const [title, setTitle] = useState('');
    const [description, setDescription] = useState('');
    const [status, setStatus] = useState('Add');
    const [todos, setTodos] = useState([]);

    function addTodo(title, description) {
        const newTodo = {
            title: title,
            description: description,
        };
        setTodos([...todos, newTodo]);

        setTitle('');
        setDescription('');
        setStatus('Add');
    }

    return (
        <>
            <div className="flex flex-col md:flex-row">
                <div className="flex-1 bg-white p-6 overflow-hidden shadow-xl">

                    <div className="flex justify-between items-center p-4">
                        <h1 className="text-2xl font-bold">Add  Todo</h1>
                        <button className="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" onClick={() => logout() }>Log Out</button>  
                    </div>

                    <div className="flex flex-col">
                        {/* <div className="flex justify-between items-center p-4">
                            <h2 className="text-xl font-bold">Add Todo</h2>
                        </div> */}
                        <div className="flex justify-between items-center p-3">
                            <input className="border-b-2 border-blue-500 p-2" type="text" placeholder="Title" onChange={(e) => setTitle(e.target.value)} value={title} />
                            <input className="border-b-2 border-blue-500 p-2" type="text" placeholder="Description" onChange={(e) => setDescription(e.target.value)} value={description} />
                            <button className="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" onClick={() => addTodo(title, description)}>{status}</button>
                        </div>
                    </div>
                </div>
                <div className="flex-1 bg-white p-6 overflow-hidden shadow-xl">
                    <div className="flex justify-between items-center p-4">
                        <h1 className="text-2xl font-bold">Todo List</h1>
                    </div>
                    <div className="flex flex-col">
                        <div className="flex flex-col">
                            <div className="flex justify-between items-center p-3">
                                <h2 className="text-xl font-bold">Title</h2>
                                <h2 className="text-xl font-bold">Description</h2>
                                <h2 className="text-xl font-bold">Action</h2>
                            </div>

                            {todos.map((todo, index) => (
                                <div className="" key={index}>
                                    <div className="flex justify-between place-items-end p-3">
                                        <h2 className="text-base font-bold">{todo.title}</h2>
                                        <h2 className="text-base font-bold">{todo.description}</h2>
                                        <div className="flex justify-between">
                                            <button
                                                onClick={() => { setTodos(todos.filter((todo, i) => i !== index)); }}>
                                                <svg className="h-6 w-6 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fillRule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clipRule="evenodd" />
                                                </svg>
                                            </button>
                                            <button
                                                onClick={() => {
                                                    setTitle(todo.title);
                                                    setDescription(todo.description); 
                                                    setTodos(todos.filter((todo, i) => i !== index));
                                                    setStatus('Update');
                                                }}>
                                                <svg className="h-6 w-6 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fillRule="evenodd" d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" clipRule="evenodd" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            ))}
                        </div>
                    </div>
                </div>
            </div>
        </>
    );
}

export default Todo;