import React, { Component } from "react";
import axios from "axios";
import ReactDOM from "react-dom";
//import "@fortawesome/fontawesome-free/js/all.js";

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
      routing: {
        goToPageDone: false,
      },
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
    console.log("Skickar data till server:", this.state.form);

    axios({
      method: "post",
      url: `${window.APP_API_ENDPOINT}/api/medlemmar/registrera`,
      data: this.state.form,
    })
      .then((response) => {
        this.setState({
          formSubmitted: true,
          formAccepted: true,
          routing: {
            ...this.state.routing,
            goToPageDone: true,
          },
          member: response.data,
          form: CUSTOMER_FORM_DEFAULTS,
        });
        console.log("Svar från server:", this.state.member);
      })
      .catch((reason) => {
        console.error("Felsvar från server:", reason);
        this.setState({ formSubmitted: true, formAccepted: false });
      });

    e.preventDefault();
  }

  handleFormFinished() {
    const fullName = `${this.state.member.firstname} ${
      this.state.member.surname || ""
    }`.trim();

    return (
      <div className="container my-5">
        <div className="container p-3 bg-light">
          <h2>Tack {fullName}!</h2>

          <h4>Du är nu registrerad!</h4>

          <div className="d-flex justify-content-center mt-3">
            <a href="/" className="btn btn-primary">
              Logga in
            </a>
          </div>
        </div>
      </div>
    );
  }

  render() {
    if (this.state.routing.goToPageDone === true) {
      return this.handleFormFinished();
    }

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
                required
                value={this.state.form.email}
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
                  required
                  value={this.state.form.password}
                  onChange={this.handleFormChange}
                />
              </div>

              <div className="col">
                <input
                  type="password"
                  className="form-control"
                  name="passwordConfirm"
                  placeholder="Bekräfta lösenord"
                  required
                  value={this.state.form.passwordConfirm}
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
                  required
                  value={this.state.form.firstname}
                  onChange={this.handleFormChange}
                />
              </div>

              <div className="col">
                <input
                  type="text"
                  className="form-control"
                  name="surname"
                  placeholder="Efternamn"
                  value={this.state.form.surname}
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
  }
}

ReactDOM.render(<CustomerRegistration />, document.getElementById("root"));

export default CustomerRegistration;
