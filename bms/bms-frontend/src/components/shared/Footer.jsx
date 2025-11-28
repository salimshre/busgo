import { FaFacebook, FaInstagram, FaLinkedin, FaLinkedinIn, FaPinterestP, FaTwitter, FaYoutube } from "react-icons/fa"
import salimlogo from '../../assets/main-icon-white.png';
const Footer = () => {
  return (
   <footer className="bg-[#2b2b2b] text-gray-400 text-sm">
    <div className="border-t border-gray-600 w-full" />
      <div className="flex flex-col items-center py-">
        {/*logo*/}
        <img src={salimlogo} alt="bookmybus logo" className="w-28 mb-4"/>
      

      {/*social icons*/}
      <div className="flex space-x-4 mb-4">
        <FaFacebook className="w-8 h-8 p-2 rounded-full bg-gray-700 text-white"/>
        <FaTwitter className="w-8 h-8 p-2 rounded-full bg-gray-700 text-white"/>
        <FaInstagram className="w-8 h-8 p-2 rounded-full bg-gray-700 text-white"/>
        <FaYoutube className="w-8 h-8 p-2 rounded-full bg-gray-700 text-white"/>
        <FaPinterestP className="w-8 h-8 p-2 rounded-full bg-gray-700 text-white"/>
        <FaLinkedinIn className="w-8 h-8 p-2 rounded-full bg-gray-700 text-white"/>

      </div>

      {/*copyright*/}
      <p className="text-center text-xs px-4 max-w-4xl">
          copyinrgint 2025 salim
          <br /> 
      </p>
      <small>
            the content and image used on this sites are copied rights
      </small>
      </div>
   </footer>
  )
}

export default Footer