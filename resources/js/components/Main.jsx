import React from 'react';
import ReactDOM from 'react-dom/client';
import '../../css/app.css';
import ChatBox from "./ChatBox.jsx";

if (document.getElementById('main')) {
    const rootUrl = "https://chat.server.itjunior.dev";
    
    ReactDOM.createRoot(document.getElementById('main')).render(
        <React.StrictMode>
            <ChatBox rootUrl={rootUrl} />
        </React.StrictMode>
    );
}