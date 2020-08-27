import React, { Component } from "react";
import axios from "axios";
import ReactDOM from "react-dom";

class CustomerRegistration extends Component {
  constructor() {
    super();
    this.state = { users: [], loading: true };
  }

  componentDidMount() {}

  getUsers() {
    axios.get(`http://localhost:8000/api/users`).then((users) => {
      this.setState({ users: users.data, loading: false });
    });
  }

  render() {
    return (
      <div className="container my-5">
        <div className="container p-3 bg-light">
          <h3 className="mt-0 mb-3 text-dark">Inloggningsuppgifter</h3>

          <div className="form-group">
            <input
              type="email"
              className="form-control"
              id="userEmail"
              placeholder="E-postadress"
            />
          </div>

          <div className="row">
            <div className="col">
              <input
                type="password"
                className="form-control"
                id="userPassword"
                placeholder="Lösenord"
              />
            </div>

            <div className="col">
              <input
                type="password"
                className="form-control"
                id="userPasswordConfirm"
                placeholder="Bekräfta lösenord"
              />
            </div>
          </div>
        </div>

        <div className="container mt-2 p-3 bg-light">
          <h3 className="mt-0 mb-3 text-dark">Personuppgifter</h3>

          <div className="row">
            <div className="col">
              <input
                type="text"
                className="form-control"
                id="userPersonFirstname"
                placeholder="Tilltalsnamn"
              />
            </div>

            <div className="col">
              <input
                type="text"
                className="form-control"
                id="userPersonSurname"
                placeholder="Efternamn"
              />
            </div>
          </div>
        </div>

        <div className="d-flex justify-content-end mt-1">
          <button type="submit" className="btn btn-primary">
            Registrera
          </button>
        </div>
      </div>
    );
  }
}

ReactDOM.render(<CustomerRegistration />, document.getElementById("root"));

export default CustomerRegistration;
