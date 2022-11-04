import React from "react";
import Log from "../Log";
const Profil = () => {
  return (
    <div className="profil-page">
      <div className="log-container">
        <Log />
        <div className="img-container">
          <img src="photos/connection1.jpg" alt="image de connection"></img>
        </div>
      </div>
    </div>
  );
};

export default Profil;
