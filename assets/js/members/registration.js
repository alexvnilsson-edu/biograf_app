import React, { Component } from "react";
import axios from "axios";
import ReactDOM from "react-dom";
import "../../css/app.scss";
import "@fortawesome/fontawesome-free/js/all.js";

const CUSTOMER_FORM_DEFAULTS = {
  email: "",
  password: "",
  passwordConfirm: "",
  firstname: "",
  surname: "",
};

class CustomerRegistration extends Component {
  constructor() {
    super();

    this.state = {
      form: CUSTOMER_FORM_DEFAULTS,
      member: null,
      formSubmitted: false,
      formAccepted: false,
    };

    this.handleFormChange = this.handleFormChange.bind(this);
    this.handleFormSubmit = this.handleFormSubmit.bind(this);
  }

  componentDidMount() {}

  handleFormChange(e) {
    if (typeof e === "undefined") {
      throw Error(`Behöver ett argument av typen Event.`);
    }

    if (typeof e.target === "undefined") {
      throw Error(`Behöver ett mål.`);
    }

    if (typeof e.target.name === "undefined") {
      throw Error(`Behöver ett namn som referens till klass.`);
    }

    const field = e.target.name;
    const affect = {};
    affect[field] = e.target.value;
    const newFormState = Object.assign(this.state.form, affect);
    this.setState({ form: newFormState });
  }

  handleFormSubmit(e) {
    axios({
      method: "post",
      url: `${window.APP_API_ENDPOINT}/api/medlemmar`,
      data: this.state.form,
    })
      .then((response) => {
        console.log("OK!");
        this.setState({
          formSubmitted: true,
          formAccepted: true,
          member: response.data,
          form: CUSTOMER_FORM_DEFAULTS,
        });
        console.log(this.state.member);
      })
      .catch((reason) => {
        console.error(reason);
        this.setState({ formSubmitted: true, formAccepted: false });
      });

    e.preventDefault();
  }

  render() {
    if (!this.state.formSubmitted || !this.state.formAccepted) {
      return (
        <div className="container my-5">
          <form onSubmit={this.handleFormSubmit}>
            <div className="d-flex mb-3 flex-row justify-space-between align-items-center">
              <a
                href="/"
                className="d-flex flex-row align-items-center px-2 mr-2"
              >
                <i className="fas fa-chevron-left fa-lg" />
              </a>
              <h1 className="my-0">Registrera ny kund</h1>
            </div>
            <div className="container p-3 bg-light">
              <h3 className="mt-0 mb-3 text-dark">Inloggningsuppgifter</h3>

              <div className="form-group">
                <input
                  type="email"
                  className="form-control"
                  name="email"
                  placeholder="E-postadress"
                  value={this.state.email}
                  onChange={this.handleFormChange}
                />
              </div>

              <div className="row">
                <div className="col">
                  <input
                    type="password"
                    className="form-control"
                    name="password"
                    placeholder="Lösenord"
                    value={this.state.password}
                    onChange={this.handleFormChange}
                  />
                </div>

                <div className="col">
                  <input
                    type="password"
                    className="form-control"
                    name="passwordConfirm"
                    placeholder="Bekräfta lösenord"
                    value={this.state.passwordConfirm}
                    onChange={this.handleFormChange}
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
                    name="firstname"
                    placeholder="Tilltalsnamn"
                    value={this.state.firstname}
                    onChange={this.handleFormChange}
                  />
                </div>

                <div className="col">
                  <input
                    type="text"
                    className="form-control"
                    name="surname"
                    placeholder="Efternamn"
                    value={this.state.surname}
                    onChange={this.handleFormChange}
                  />
                </div>
              </div>
            </div>

            <div className="d-flex justify-content-end mt-1">
              <button type="submit" className="btn btn-primary">
                Registrera
              </button>
            </div>
          </form>
        </div>
      );
    } else if (this.state.formSubmitted && this.state.formAccepted) {
      return (
        <div className="container my-5">
          <div className="container p-3 bg-light">
            <h2>Du är nu registrerad!</h2>

            <p>
              <strong>
                Tack {this.state.member.firstname} {this.state.member.surname}!
              </strong>
            </p>
          </div>
        </div>
      );
    }
  }
}

ReactDOM.render(<CustomerRegistration />, document.getElementById("root"));

export default CustomerRegistration;
