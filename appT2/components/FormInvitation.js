import { StatusBar } from "expo-status-bar";
import { useState } from "react";
import { Button, StyleSheet, Text, View, TextInput, Alert } from "react-native";
import axios from "axios";

const server = "https://c63e-168-176-145-65.ngrok-free.app";
export default function FormInvitation() {
  const [formReg, setFormreg] = useState({
    nombre: "",
    apellido: "",
    edad: "",
    cAcompanantes: "",
  });

  const sendForm = () => {
    console.log(formReg);
    fetch(`${server}/api/invitados`, {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
        Accept: "application/json",
        "Access-Control-Allow-Origin": "*",
      },
      body: JSON.stringify(formReg),
    })
      .then((response) => response.json())
      .then((data) => {
        console.log(data);
        if (data && data.id) {
          Alert.alert(
            `Se registró ${data.nombre} correctamente a las ${data.horaIngreso}`
          );

          setFormreg({
            nombre: "",
            apellido: "",
            edad: "",
            cAcompanantes: "",
          });
        } else {
          Alert.alert("Ocurrión un problema! :(");
        }
      })
      .catch((error) => {
        Alert.alert("Ocurrión una Exepción! :(");
        console.log(error);
      });
  };

  const testNumber = (number) => {
    const regex = /^[0-9]+$/;
    return regex.test(number);
  };
  return (
    <View style={styles.container}>
      <Text>Asistentes!</Text>
      <TextInput
        style={styles.input}
        placeholder="Nombre"
        onChangeText={(eText) => setFormreg({ ...formReg, nombre: eText })}
        value={formReg.nombre}
      />
      <TextInput
        style={styles.input}
        placeholder="Apellido"
        onChangeText={(eText) => setFormreg({ ...formReg, apellido: eText })}
        value={formReg.apellido}
      />
      <TextInput
        style={styles.input}
        placeholder="Edad"
        onChangeText={(eText) =>
          setFormreg({
            ...formReg,
            edad: testNumber(eText) ? eText : formReg.edad,
          })
        }
        value={formReg.edad}
        keyboardType="number-pad"
      />
      <TextInput
        style={styles.input}
        placeholder="Cantidad Acompañantes"
        onChangeText={(eText) =>
          setFormreg({
            ...formReg,
            cAcompanantes: testNumber(eText)
              ? Number(eText)
              : formReg.cAcompanantes,
          })
        }
        value={formReg.cAcompanantes}
        keyboardType="numeric"
      />
      <Button title="Enviar" onPress={sendForm} />

      <StatusBar style="auto" />
    </View>
  );
}

const styles = StyleSheet.create({
  container: {
    flex: 1,
    backgroundColor: "#fff",
    alignItems: "center",
    justifyContent: "center",
  },
  input: {
    height: 40,
    margin: 12,
    borderWidth: 1,
    padding: 10,
  },
});
