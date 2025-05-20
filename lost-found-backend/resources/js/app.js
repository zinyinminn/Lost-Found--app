import { BrowserRouter as Router, Routes, Route } from 'react-router-dom';
import Navbar from './components/Navbar';
import Home from './pages/Home';
import Lost from './pages/Lost';
import Found from './pages/Found';
import AddEdit from './pages/AddEdit';

function App() {
  return (
    <Router>
      <Navbar />
     <Routes>
  <Route path="/" element={<Home />} />
  <Route path="/lost" element={<Lost />} />
  <Route path="/found" element={<Found />} />
  <Route path="/itemform" element={<ItemForm />} />          {/* for add new */}
  <Route path="/itemform/:id" element={<ItemForm />} />      {/* for edit */}
</Routes>

    </Router>
  );
}

export default App;


