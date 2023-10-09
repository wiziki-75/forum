```
import subprocess

# Informations de connexion
user = 'root'
password = ''

# Liste des bases de données
databases = ['BdD_RSC', 'BdD_RUN', 'BdD_RVC', 'BdD_SDC', 'BdD_SHC', 'BdD_SMP', 
             'BdD_STC', 'BdD_TLN', 'BdD_TLS', 'BdD_TRS', 'BdD_VRN', 'BdD_VTI']

# Requête SQL
query_template = "UPDATE bdd_{}_menu SET link = 'https://eureka.intradef.gouv.fr' where link = 'http://portail-eureka.intradef.gouv.fr/';"

# Exécution de la requête pour chaque base de données
for database in databases:
    try:
        command = f"mysql -u {user} -p{password} -e \"{query_template.format(database[-3:])}\" {database}"
        subprocess.run(command, shell=True, check=True)
        print(f"La requête a été exécutée avec succès sur la base de données {database}.")
    except Exception as e:
        print(f"Erreur lors de l'exécution de la requête sur la base de données {database}: {e}")

```
